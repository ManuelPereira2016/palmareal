<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Organization;
use PalmaReal\Historical;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {}

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
    public function show()
    {       
        $organization = Organization::FindOrFail(1);

        return view('admin.organization.show')->with(['organization' => $organization]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $organization = Organization::FindOrFail(1);

        return view('admin.organization.edit')->with(['organization' => $organization]);
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
            Organization::FindOrFail($id)->update($request->all());         
            
            Historical::insert([
                'transaction' => 2, 
                'description' => 'Organizacion Actualizada. ', 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Log::error('Registro exitoso en HeaderController -> update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en HeaderController -> Update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return redirect()->route('header-show', $id);
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
