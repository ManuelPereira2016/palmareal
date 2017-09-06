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
use PalmaReal\Admin;
use PalmaReal\Banner;
use PalmaReal\Media;
use PalmaReal\Message;
use PalmaReal\Map;
use PalmaReal\Page;
use PalmaReal\Tag;

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
        $page = Page::FindOrFail(1);
        $footer = Page::FindOrFail(7);
        $media = Media::where('media.table', 'properties')->get();
        $properties = Property::where(['properties.status' => 1])
        ->orderBy('created_at', 'desc')
        ->offset(0)
        ->limit(4)
        ->get();
        return view('index')->with(['properties' => $properties, 'media' => $media, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps]);
    }

    /**
     * Paginate a laravel colletion or array of items.
     *
     * @param  array|Illuminate\Support\Collection $items   array to paginate
     * @param  int $perPage number of pages
     * @return Illuminate\Pagination\LengthAwarePaginator    new LengthAwarePaginator instance 
     */
    public function paginate($items, $perPage)
    {
        if(is_array($items)){
            $items = collect($items);
        }

        return new LengthAwarePaginator(
            $items->forPage(Paginator::resolveCurrentPage() , $perPage),
            $items->count(), $perPage,
            Paginator::resolveCurrentPage(),
            ['path' =>Paginator::resolveCurrentPath()]
        );
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
    public function inmobiliaria()
    {
        $tags = Tag::all();
        $banners = Banner::where('page', 3)->get();
        $page = Page::FindOrFail(3);
        $maps = Map::where('id', 1)->first();
        $footer = Page::FindOrFail(7);
        $media = Media::where('media.table', 'properties')->get();
        $properties_types = PropertyTypes::all();
        $locations = Locations::all()->pluck('name')->toArray();

        $properties = Property::orderBy('created_at', 'desc')->paginate(12);
        return view('inmobiliaria')->with(['properties_types' => $properties_types, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps, 'properties' => $properties, 'media' => $media , 'tags' => $tags, 'locations' => $locations]);
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
        $bathrooms_options = "";
        $rooms_options = "";
        $garages_options = "";

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

        if($request->has('property_types')){
            $properties = $properties->filter(function($item) use ($request){
                if (count($item->types->whereIn('id', $request->property_types)->all())){
                    return True;
                }
            });
        }

        $properties = $this->paginate($properties, 12);

        if($request->has('name')){
            flash('Se han encontrado '. count($properties) .' resultados', 'info');
        }

        // Look for the selected filters
        for($i=1; $i <= 4; $i++){
            $selected = "";
            if($i==1){
                $msg = "1 baño";
            } elseif ($i==4) {
                $msg = "Mas de 4 Baños";
            } else {
                $msg = $i . " Baños";
            }

            if($request->has('bathrooms')){
                if(in_array($i, $request['bathrooms'])){
                    $selected = 'checked="checked"';
                }
            }     

            $bathrooms_options .= "<div class='checkbox'><label class='text-capitalize'><input name='bathrooms[]' " . $selected . " type='checkbox' value='" . $i . "' />" . 
                $msg . "</label></div>";
        }

        for($i=1; $i <= 4; $i++){
            $selected = "";
            if($i==1){
                $msg = "1 Garage";
            } elseif ($i==4) {
                $msg = "Mas de 4 Garages";
            } else {
                $msg = $i . " Garages";
            }

            if($request->has('garages')){
                if(in_array($i, $request['garages'])){
                    $selected = 'checked="checked"';
                }
            }

            $garages_options .= '
                <div class="checkbox"><label class="text-capitalize">
                <input name="garages[]" ' . 
                $selected . ' type="checkbox" value="' . $i . '" />' . 
                $msg . '</label></div>';
        }

        for($i=1; $i <= 5; $i++){
            $selected = "";
            if($i==1){
                $msg = "1 Habitación";
            } elseif ($i==5) {
                $msg = "Mas de 5 Habitaciones";
            } else {
                $msg = $i . " Habitaciones";
            }

            if($request->has('rooms')){
                if(in_array($i, $request['rooms'])){
                    $selected = 'checked="checked"';
                }
            }

            $rooms_options .= '
                <div class="checkbox"><label class="text-capitalize">
                <input name="rooms[]" ' . 
                $selected . ' type="checkbox" value="' . $i . '" />' . 
                $msg . '</label></div>';
        }

        return view('inmobiliaria')->with(['bathrooms_options' => $bathrooms_options, 'rooms_options' => $rooms_options, 'garages_options' => $garages_options, 'request' => $request->toArray(), 'properties_types' => $properties_types, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps, 'properties' => $properties, 'media' => $media, 'tags' => $tags, 'locations' => $locations]);
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
            
            $images = media::where(['table' => 'properties', 'item' => $id])->get();
            // $admin = Admin::FindOrFail($property -> admin);
            $proximities = explode(',', $property -> proximities);
            $characteristics = explode(',', $property -> characteristics);
            $types = $property -> types;
            return view('propiedad')->with(['property' => $property, 'proximities' => $proximities, 'characteristics' => $characteristics,  'images' => $images, 'types' => $types, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps]);
        } else {
            flash('La prpiedad no existe', 'danger');
            return back();
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
