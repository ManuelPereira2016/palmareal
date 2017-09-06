<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Historical;
use PalmaReal\Banner;
use PalmaReal\Admin;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index')->with(['banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mime=File::mimeTyp($request -> file('image'));
        dd($mime);
        // try{
        //     $file = $request -> file('image');
        //     $type_file = $file -> getClientMimeType();

        //     //Si el archivo recibido no es un JPG o un PNG no ejecutamos nada y volvemos hacia atras
        //     if ($type_file == 'image/jpeg' || $type_file == 'image/jpg' || $type_file == 'image/png') {
        //         if ($type_file == 'image/jpeg' || $type_file == 'image/jpg') {
        //             $type_file = '.jpg';
        //         }elseif ($type_file == 'image/png') {
        //             $type_file = '.png';
        //         }

        //         $file_name = time() . mt_rand() . $type_file;
        //         $file -> move('imgs/banners', $file_name );  

        //         $request->merge(['image' => 'file_name'])  ;
        //         Banner::create($request -> all()); 
        //     } else{
        //         return false;
        //     }                

        //     Historical::insert([
        //         'transaction' => 1, 
        //         'description' => 'Banner '.Banner::all()->last()->id, 
        //         'user' => Auth::user()->id, 
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ]);
        //     Log::info('Creacion exitosa en BannerController -> Store');
        //     flash('Proceso exitoso', 'success');
        // }catch (\Exception $e) {
        //     Log::error('Error en BannerController -> Store. Error: ['.$e.']');
        //     flash('¡Error! Ha ocurrido un problema', 'danger');

        // }
        // return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::FindOrFail($id);
        return view('admin.banners.edit')->with(['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            if (!empty($request -> file('image'))) {
                $file = $request -> file('image');
                $type_file = $file -> getClientMimeType();

                //Si el archivo recibido no es un JPG o un PNG no ejecutamos nada y volvemos hacia atras
                if ($type_file == 'image/jpeg' || $type_file == 'image/jpg' || $type_file == 'image/png') {
                    if ($type_file == 'image/jpeg' || $type_file == 'image/jpg') {
                        $type_file = '.jpg';
                    }elseif ($type_file == 'image/png') {
                        $type_file = '.png';
                    }
                    $banner = Banner::FindOrFail($id);
                    if (!empty($banner -> image)){
                        if (Storage::disk('banners') -> has($banner -> image)) {
                            Storage::disk('banners') -> delete($banner -> image);
                        }                       
                    }
                    $file_name = time() . mt_rand() . $type_file;
                    $file -> move('imgs/banners', $file_name );     
                }    
            }else{
                $file_name = Banner::FindOrFail($id)->image;
            }

            Banner::FindOrFail($id)->update([
                'name' =>  $request -> name,
                'description' =>  $request -> description,
                'link' =>  $request -> link,
                'image' =>  $file_name,
                'updated_at' => date('Y:m:d H:i:s'),
            ]);               

            Historical::insert([
                'transaction' => 2, 
                'description' => 'Banner '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Log::info('Modificacion exitosa en BannerController -> Update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en BannerController -> Update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $image = Banner::FIndOrFail($id)->image;
            if (!empty($image)){
                if (Storage::disk('banners') -> has($image)) {
                    Storage::disk('banners') -> delete($image);
                }                       
            }
            Banner::destroy($id);
            Historical::insert([
                'transaction' => 3, 
                'description' => 'Banner '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Log::info('Registro exitoso en BannerController -> destroy');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en BannerController -> destroy. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->route('banners.index');
    }
}
