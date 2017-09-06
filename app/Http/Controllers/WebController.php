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

        $properties = Property::orderBy('created_at', 'desc')->paginate(12);
        return view('inmobiliaria')->with(['properties_types' => $properties_types, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps, 'properties' => $properties, 'media' => $media , 'tags' => $tags]);
    }
    
    public function search(Request $request){
        
        $tags = Tag::all();
        $properties_types = PropertyTypes::all();
        $banners = Banner::where('page', 3)->get();
        $page = Page::FindOrFail(3);
        $maps = Map::where('id', 1)->first();
        $footer = Page::FindOrFail(7);
        $media = Media::where('media.table', 'properties')->get();

        if($request->has('name')){
            $properties = Property::search($request->name)->get();
        } else {
            $properties = Property::orderBy('created_at', 'desc')->get();
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

        if($request->rooms){
            if($request->rooms == '5'){
                $symbol = '>=';
            } else {
                $symbol = '=';
            }
            $properties = $properties->where('rooms', $symbol, $request->rooms);            
        }

        if($request->bathrooms){
            if($request->rooms == '4'){
                $symbol = '>=';
            } else {
                $symbol = '=';
            }
            $properties = $properties->where('bathrooms', '=', $request->bathrooms);            
        }

        if($request->garages){
            if($request->rooms == '4'){
                $symbol = '>=';
            } else {
                $symbol = '=';
            }
            $properties = $properties->where('garages', $symbol, $request->garages);            
        }

        if($request->property_type){
            $properties = $properties->filter(function($item) use ($request){
                if (count($item->types->where('id', $request->property_type)->all())){
                    return True;
                }
            });
        }

        $properties = $this->paginate($properties, 12);

        if($request->has('name')){
            flash('Se han encontrado '. count($properties) .' resultados', 'info');
        }

        return view('inmobiliaria')->with(['properties_types' => $properties_types, 'page' => $page, 'footer' => $footer, 'banners' => $banners, 'maps' => $maps, 'properties' => $properties, 'media' => $media, 'tags' => $tags]);
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
            $types = explode(',', $property -> type);
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
