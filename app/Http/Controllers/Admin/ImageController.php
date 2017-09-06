<?php
namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Property;
use PalmaReal\User;
use PalmaReal\Admin;
use PalmaReal\Media;

class imageController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //Recibimos el archivo enviado mediante el formulario
            $file = $request -> file('image');
            $type_file = $file -> getClientMimeType();

            //Si el archivo recibido no es un JPG o un PNG no ejecutamos nada y volvemos hacia atras
            if ($type_file == 'image/jpeg' || $type_file == 'image/jpg' || $type_file == 'image/png') {
                if ($type_file == 'image/jpeg' || $type_file == 'image/jpg') {
                    $type_file = '.jpg';
                }elseif ($type_file == 'image/png') {
                    $type_file = '.png';
                }

                $file_name = time() . mt_rand() . $type_file;
                $file -> move('imgs/'.$request -> table, $file_name );     
                Media::insert([
                    'item' => $request -> item, 
                    'table' => $request -> table, 
                    'url' => $file_name,
                    'created_at' => date('Y:m.d H:i:s'),
                    'updated_at' => date('Y:m.d H:i:s')
                ]);
            }       

            Log::info('Operacion realizada exitosamente! image Controller -> store()');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error! imageController -> store() - Error: ['. $e . ']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }

        return back();
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
        $image = Media::FindOrFail($id);
        return view('admin.imagen')->with(['image' => $image]);
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
            //Recibimos el archivo enviado mediante el formulario
            $file = $request -> file('image');
            $type_file = $file -> getClientMimeType();

            //Si el archivo recibido no es un JPG o un PNG no ejecutamos nada y volvemos hacia atras
            if ($type_file == 'image/jpeg' || $type_file == 'image/jpg' || $type_file == 'image/png') {
                if ($type_file == 'image/jpeg' || $type_file == 'image/jpg') {
                    $type_file = '.jpg';
                }elseif ($type_file == 'image/png') {
                    $type_file = '.png';
                }
                
                $file_name = time() . mt_rand() . $type_file;

                switch ($request -> page) {                                        
                    case 'perfil':
                        $admin = Admin::FindOrFail(Auth::user() -> id);
                        if (!empty($admin -> image)){
                            if (Storage::disk('admins') -> has($admin -> image)) {
                                Storage::disk('admins') -> delete($admin -> image);
                            }                       
                        }

                        $file -> move('imgs/admins', $file_name );
                        Admin::where('id', Auth::user() -> id) -> update(['image' => $file_name]); 
                        break;
                                     
                    default:
                        $image = Media::FindOrFail($id);
                        if (!empty($image -> url)) {
                            if (Storage::disk($image -> table) -> has($image -> url)) {
                                Storage::disk($image -> table) -> delete($image -> url);
                            }                       
                        }
                        
                        $file -> move('imgs/'.$image -> table, $file_name );
                        Media::where('id',$id) -> update(['url' => $file_name]);                        
                    
                        return redirect()->back();
                        break;
                }  
            }    
            flash('Proceso exitoso', 'success');
            Log::info('Operacion realizada exitosamente! image Controller -> update()');
        }catch (\Exception $e) {
            Log::error('Error! imageController -> update() - Error: ['. $e . ']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->back();   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{
            $image = Media::FindOrFail($id);
            if (!empty($image -> url)) {
                if (Storage::disk($image -> table) -> has($image -> url)) {
                    Storage::disk($image -> table) -> delete($image -> url);
                }                       
            }
            Media::destroy($id);
            Log::info('Operacion realizada exitosamente! image Controller -> destry()');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error! imageController -> destroy() - Error: ['. $e . ']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }

        return redirect()->route('propiedades.show', $request -> item);
    }
}
