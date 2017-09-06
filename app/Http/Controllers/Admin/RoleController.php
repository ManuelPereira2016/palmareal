<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Role;
use PalmaReal\Module;
use PalmaReal\RoleModule;
use PalmaReal\Historical;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('id', '!=', 999999)->get();
        return view('admin.roles.index')->with(['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin.roles.create')->with(['modules' => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{   
            Role::insert([
                'name' => $request -> name,
                'description' => $request -> description,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]); 

            $id = Role::all()->last()->id;           
            
            foreach($request -> modules as $element){
                $data[] = ['fk_id_role' => $id, 'fk_id_module' => $element];
            }

            RoleModule::insert($data);

            Historical::insert([
                'transaction' => 1, 
                'description' => 'Rol '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Log::error('Registro exitoso en RoleController -> Store');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en RoleController -> Store. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $rol = Role::FindOrFail($id);
        $modules = Module::all();
        $roles_modules = RoleModule::where('fk_id_role', $id)->get()->toArray();

        return view('admin.roles.show')->with(['rol' => $rol, 'modules' => $modules, 'roles_modules' => $roles_modules]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::FindOrFail($id);
        $modules = Module::all();
        $roles_modules = RoleModule::where('fk_id_role', $id)->get()->toArray();
        return view('admin.roles.edit')->with(['rol' => $rol, 'modules' => $modules, 'roles_modules' => $roles_modules]);
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

            Role::FindOrFail($id)->update($request->all());         
            
            RoleModule::where('fk_id_role', $id) -> delete();
            
            foreach($request -> modules as $element){
                $data[] = ['fk_id_role' => $id, 'fk_id_module' => $element];
            }
            RoleModule::insert($data);
            Historical::insert([
                'transaction' => 2, 
                'description' => 'Rol '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Log::error('Registro exitoso en RoleController -> update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en RoleController -> Update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return redirect()->route('roles.show', $id);
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

            RoleModule::where('fk_id_role', $id)->delete();
            Role::where('id', $id)->delete();

            Historical::insert([
                'transaction' => 3, 
                'description' => 'Rol eliminado', 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Log::error('Registro exitoso en RoleController -> destroy');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en RoleController -> destroy. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return redirect()->route('roles.index');
    }
}
