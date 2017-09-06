<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PalmaReal\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PalmaReal\Historical;
use PalmaReal\Admin;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $noticias = Historical::where('admin', Auth::user()->id)
        ->paginate(10);
*/
        $admin = Admin::FindOrFail(Auth::user()->id);
        return view('admin.perfil')->with(['admin' => $admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     

        $usuario = Admin::FindOrFail(Auth::user()->id);
        return view('admin.perfil')->with(['usuario' => $usuario]);
 
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
        //
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
            Admin::FindOrFail($id)
            ->update($request -> all());
            Historical::insert([
                'transaction' => 2, 
                'description' => 'Modificado los datos de perfil del usuario '.Auth::user()->username, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Log::info('Modificacion exitosa en perfilController -> update'); 
            flash('Proceso exitoso', 'success');           
        }catch (\Exception $e) {
            Log::error('Error en adminController -> update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        
        return redirect()->route('perfil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request, $id)
    {
         try{
            $usuario = Admin::FindOrFail($id);
            if (Hash::check($request -> old_password, $usuario -> password)) {
                Admin::FindOrFail($id)
                ->update([
                    'password' => bcrypt($request -> password)
                ]);
                Historical::insert([
                'transaction' => 2, 
                'description' => 'Modificado los datos de perfil del usuario '.Auth::user()->username, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
                Log::info('Operacion exitosa en perfilController -> changePassword'); 
                flash('Proceso exitoso', 'success');
            }else{
                flash('Contraseña incorrecta', 'danger');
            }
        }catch (\Exception $e) {
            Log::error('Error en adminController -> changePassword. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        
        return redirect()->route('perfil.index');
    }

}
