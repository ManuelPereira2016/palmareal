<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Page;
use PalmaReal\Historical;
use PalmaReal\Message;
use PalmaReal\Banner;
use PalmaReal\Media;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::select('pages.*', 'admins.first_name', 'admins.last_name')->join('admins', 'admins.id', 'pages.author')->get();
        return view('admin.paginas.index')->with(['pages' => $pages]);
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banners = Banner::where('page', $id)->get();
        $page = Page::FindOrFail($id);
        return view('admin.paginas.show')->with(['page' => $page, 'banners' => $banners]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $page = Page::FindOrFail($id);
        return view('admin.paginas.edit')->with(['page' => $page]);
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
            Page::FindOrFail($id)
            ->update($request -> all());

            Historical::insert([
                'transaction' => 2, 
                'description' => 'Pagina '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            Log::info('Registro exitoso en pageController -> update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en pageController -> update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->route('paginas.show', $id);
    }
    
    public function showBanner($id){
        
        $banner = Banner::FindOrFail($id);
        return view('admin.paginas.banner')->with(['banner' => $banner]);
    }

    public function storeBanner(Request $request){
        $formats = ['jpg', 'jpeg', 'png', 'svg'];

        try{
            $file = $request -> file('images');
            $type_file = $request -> file('images')->getClientOriginalExtension();

            if(in_array($type_file, $formats)){          
                $file_name = time() . mt_rand() . $type_file;
                $file -> move('imgs/banners', $file_name ); 
                $request -> merge([ 'image' => $file_name ]);
                
                Banner::create($request -> all()); 
            }        

            Historical::insert([
                'transaction' => 1, 
                'description' => 'Banner '.$request -> id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            Log::info('Registro exitoso en pageController -> update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en pageController -> update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->route('paginas.show', $request -> id);
    }

    public function imageUpload(Request $request){
        $files_records = array();
        try{
            if (!empty($request -> file('file'))) {
                $image = $request -> file('file');
                $type_file = $image->getClientOriginalExtension();

                $file_name = time() . mt_rand() . $type_file;
                $image -> move('imgs/pages/', $file_name ); 
                $files_records[] = ['table' => 'pages', 'item' => $request->id, 'url' => $file_name];
            }

            $insert_media = Media::insert($files_records);

            return response()->json(['location' => '/imgs/pages/'. $file_name ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e]);
        }      
    }

    public function updateBanner(Request $request, $id){
        $formats = ['jpg', 'jpeg', 'png', 'svg']; 

        try{
            if (!empty($request -> file('images'))) {
                $file = $request -> file('images');
                $type_file = $request -> file('images')->getClientOriginalExtension();

                if(in_array($type_file, $formats)){      
                    $banner = Banner::FindOrFail($id);
                    if (!empty($banner -> image)){
                        if (Storage::disk('banners') -> has($banner -> image)) {
                            Storage::disk('banners') -> delete($banner -> image);
                        }                       
                    }    

                    $file_name = time() . mt_rand() . $type_file;
                    $file -> move('imgs/banners', $file_name ); 
                    $request -> merge([ 'image' => $file_name ]);
                }                       
            }else{
                $banner = Banner::FindOrFail($id);
                $file_name = $banner -> image;
            }

            Banner::FindOrFail($id)->update($request -> all());               

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
        return redirect()->route('paginas.imagen.show', $banner -> id);
    }

    public function destroyBanner($id){
        try{

            $banner = Banner::FindOrFail($id);
            if (!empty($banner -> image)) {
                if (Storage::disk('banners') -> has($banner -> image)) {
                    Storage::disk('banners') -> delete($banner -> image);
                }                       
            }

            Banner::FindOrFail($id) -> delete();

            Historical::insert([
                'transaction' => 3, 
                'description' => 'Banner '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            Log::info('Registro exitoso en pageController -> update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en pageController -> update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->route('paginas.show', $banner -> page);
    }

}
