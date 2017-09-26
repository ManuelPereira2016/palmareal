<?php

namespace PalmaReal\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use TeamTNT\TNTSearch\TNTSearch;
use PalmaReal\Property;
use PalmaReal\Locations;
use PalmaReal\PropertyTypes;
use PalmaReal\GoogleMapsLocations;
use PalmaReal\Admin;
use PalmaReal\Banner;
use PalmaReal\Media;
use PalmaReal\Message;
use PalmaReal\PropertyComments;
use PalmaReal\BestProperties;
use PalmaReal\Map;
use PalmaReal\Page;
use PalmaReal\Tag;
use PalmaReal\Organization;

class WebController extends Controller
{   
    /**
     * Pagina de inicio.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::where('id', 1)->first();
        $banners = Banner::where(['page' => '1'])->get();
        $organization = Organization::where('id', 1)->first();
        $page = Page::FindOrFail(1);
        $footer = Page::FindOrFail(7);
        $media = Media::where('media.table', 'properties')->get();
        $properties = Property::where(['properties.status' => 1])
        ->orderBy('created_at', 'desc')
        ->offset(0)
        ->limit(4)
        ->get();
        return view('index')->with(['organization' => $organization, 'properties' => $properties, 'media' => $media, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps]);
    }

    /**
     * Paginate a laravel colletion or array of items.
     *
     * @param  array|Illuminate\Support\Collection $items   array to paginate
     * @param  int $perPage number of pages
     * @return Illuminate\Pagination\LengthAwarePaginator    new LengthAwarePaginator instance 
     */
    public function paginate($items, $perPage, $request)
    {
        if(is_array($items)){
            $items = collect($items);
        }

        if($request->has('page')){
            $page = $request->page;
        } else {
            $page = 1;
        }
        
        $offset = ($page * $perPage) - $perPage;
        $itemsForCurrentPage = array_slice($items->toArray(), $offset, $perPage, true);
        
        $final_items = collect();
        foreach ($itemsForCurrentPage as $key => $value) {
            $final_items[] = $value;
        }
 
        return new LengthAwarePaginator(
            $final_items,
            $items->count(),
            $perPage,
            $page,
            ['path' =>Paginator::resolveCurrentPath()]
        );
    }

    public function makeArrayFromObject($obj){
        $collection = collect();

        $obj->each(function($item) use ($collection) {
            $collection[] = $item;
        });

        return $collection;
    }

    /**
     * Pagina de constricciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function constructora()
    {
        $maps = Map::where('id', 1)->first();
        $banners = Banner::where('page', 2)->get();
        $page = Page::FindOrFail(2);
        $footer = Page::FindOrFail(7);
        return view('constructora')->with(['page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function inmobiliaria(Request $request)
    {
        $best = null;
        $tags = Tag::all();
        $banners = Banner::where('page', 3)->get();
        $page = Page::FindOrFail(3);
        $maps = Map::where('id', 1)->first();
        $footer = Page::FindOrFail(7);
        $media = Media::where('media.table', 'properties')->get();
        $properties_types = PropertyTypes::all();
        $locations = Locations::all()->pluck('name')->toArray();

        $properties = Property::orderBy('created_at', 'desc')->get();

        $best_properties = BestProperties::orderBy('avg', 'asc');

        if($best_properties){
            $best_properties = $best_properties->limit(4)->pluck('property_id')->toArray();

            $best = $properties->whereIn('id', $best_properties);
        }

        $properties = $properties->map(function($prop) use ($media){
            $prop_images = $media->whereIn('item', $prop->id)->pluck('url')->toArray();
            $prop['images'] = $prop_images;
            return $prop;
        });

        $properties = $this->paginate($properties, 12, $request);

        return view('inmobiliaria')->with(['best_properties' => $best, 'properties_types' => $properties_types, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps, 'properties' => $properties, 'media' => $media , 'tags' => $tags, 'locations' => $locations]);
    }
    
    public function search(Request $request){
        
        $tags = Tag::all();
        $properties_types = PropertyTypes::all();
        $banners = Banner::where('page', 3)->get();
        $page = Page::FindOrFail(3);
        $maps = Map::where('id', 1)->first();
        $footer = Page::FindOrFail(7);
        $media = Media::where('media.table', 'properties')->get();
        $locations = Locations::all()->pluck('name')->toArray();
        $message = "";

        if($request->has('name')){
            $properties = Property::search($request->name)->get();
        } else {
            $properties = Property::orderBy('created_at', 'desc')->get();
        }

        if($request->has('locations')){
            $full_text = implode(',', $request->get('locations'));

            $find = Property::search($full_text)->get()->pluck('id')->toArray();

            $properties = $properties->whereIn('id', $find);
        }

        if($request->min_price){
            $properties = $properties->where('price', '>', $request->min_price);
        }

        if($request->max_price){
            $properties = $properties->where('price', '<', $request->max_price);            
        }

        if($request->min_size){
            $properties = $properties->where('size', '>', $request->min_size);
        }

        if($request->max_size){
            $properties = $properties->where('size', '<', $request->max_size);            
        }

        if($request->has('rooms')){
            $new_properties = new Collection();
            foreach($request->get('rooms') as $val)
            {
                if($val == '5'){
                    $symbol = '>=';
                } else {
                    $symbol = '=';
                }
                $new_properties = $new_properties->merge($properties->where('rooms', $symbol, (int)$val));
            }  
            $properties = $new_properties;
        }

        if($request->has('bathrooms')){
            $new_properties = new Collection();
            foreach($request->get('bathrooms') as $val)
            {
                if($val == '4'){
                    $symbol = '>=';
                } else {
                    $symbol = '=';
                }
                $new_properties = $new_properties->merge($properties->where('bathrooms', $symbol, (int)$val));
            }

            $properties = $new_properties;
        }

        if($request->has('garages')){
            $new_properties = new Collection();
            foreach($request->get('garages') as $val)
            {
                if($val == '4'){
                    $symbol = '>=';
                } else {
                    $symbol = '=';
                }
                $new_properties = $new_properties->merge($properties->where('garages', $symbol, (int)$val));
            }
            $properties = $new_properties;
        }

        // After every filter was ended we need our object to get ready to response.
        $properties = $this->makeArrayFromObject($properties);

        if($request->has('property_types')){
            $new_properties = collect();
            $properties->each(function($item) use ($request, $new_properties) {
                if (count($item->types->whereIn('id', $request->property_types)->all())){
                    $new_properties[] = $item;
                }
            });

            $properties = $new_properties;
        }       

        // Verificamos los valores que se enviaron.
        $input = $request->except('_token');
        foreach ($input as $key => $value) {
            if($value){
                $message = flash('Se han encontrado '. count($properties) .' resultados', 'info')->messages;
            }
        }

        $properties = $this->paginate($properties, 12, $request);

        return response()->json(['properties_types' => $properties_types, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps, 'properties' => $properties->all(), 'media' => $media, 'tags' => $tags, 'locations' => $locations, 'message' => $message, 'paginator' => view('pagination.properties')->with(['properties' => $properties])->render()]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function propiedad($id)
    {
        $property = Property::where(['properties.status' => 1, 'properties.id' => $id])
        ->first();
        if (count($property)>0) {
            $maps = Map::where('id', 1)->first();
            $footer = Page::FindOrFail(7);
            $banners = Banner::where('page', 4)->get();
            $location = GoogleMapsLocations::where('property_id', $id)->get();
            $comments = PropertyComments::where('property_id', $id)->get();
            
            $images = media::where(['table' => 'properties', 'item' => $id])->get();

            // $admin = Admin::FindOrFail($property -> admin);
            $proximities = explode(',', $property -> proximities);
            $characteristics = explode(',', $property -> characteristics);
            $types = $property -> types;
            return view('propiedad')->with(['comments' => $comments, 'property' => $property, 'proximities' => $proximities, 'characteristics' => $characteristics,  'images' => $images, 'types' => $types, 'footer' => $footer, 'location' => $location, 'banners' => $banners, 'maps' => $maps]);
        } else {
            flash('La propiedad no existe', 'danger');
            return back();
        }
        
    }

    public function getPropertyLocation(Request $request){
        if($request->has('id')){
            $location = GoogleMapsLocations::where('property_id', $request->id)->get();
            return response()->json($location);
        } else {
            return response()->json('No se envio el id!.');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function corretaje()
    {
        $maps = Map::where('id', 1)->first();
        $banners = Banner::where('page', 5)->get();
        $page = Page::FindOrFail(5);
        $footer = Page::FindOrFail(7);
        return view('corretaje')->with(['page' => $page, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto()
    {
        $maps = Map::where('id', 1)->first();
        $banners = Banner::where('page', 6)->get();
        $page = Page::FindOrFail(6);
        $footer = Page::FindOrFail(7);

        return view('contacto')->with(['page' => $page, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps ]);
    }

    public function contactoSend(Request $request){
        try{
            $request -> request -> add(['status' => 0]);
            $request -> request -> add(['subject' => 'Mensaje de contacto: '.$request -> subj ]);
            
            Message::create($request -> all());

            Log::info('Proceso exitoso en WebController -> contactSend');
            flash('Su mensaje ha sido enviado. En las proximas horas lo estaremos contactando.', 'success');
        }catch (\Exception $e) {
            Log::error('Error en WebController -> contactSend. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return back();
    }

    public function sendMessage(Request $request){
        try{

            $property = Property::FindOrFail($request -> property);
            $request -> request -> add(['status' => 0]);
            $request -> request -> add(['subject' => 'Propiedad: '. $property -> name]);
            
            Message::create($request -> all());

            Log::info('Proceso exitoso en WebController -> sendMessage');
            flash('Mensaje enviado exitosamente', 'success');
        }catch (\Exception $e) {
            Log::error('Error en WebController -> sendMessage. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return back();
    }
}
