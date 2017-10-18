<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\PropertyTypes;
use PalmaReal\PropertiesTypesRelations;
use PalmaReal\Historical;
use Exception;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try{   
            PropertyTypes::create($request ->all());
            $id = PropertyTypes::all() -> last() -> id;
            Historical::insert([
                'transaction' => 1, 
                'description' => 'Tipo de inmueble' . $id . ' fue creada', 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Log::error('Registro exitoso en PropertyController -> Store');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en PropertyController -> Store. Error: ['.$e.']');
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
        //
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
            if (PropertiesTypesRelations::where('properties_type_id', $id)->count()){
                throw new Exception('Existen propiedades asociadas a este tipo.');
            }

            PropertyTypes::Find($id)->delete();
            Historical::insert([
                'transaction' => 3, 
                'description' => 'Tipo de inmueble ' . $id , 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Log::notice('Proceso exitoso en TypeController -> destroy');
            flash('Tipo de inmueble eliminado exitosamente', 'success');
        }catch (\Exception $e) {
            Log::error('Error en TypeController -> destroy. Error: ['.$e->getMessage().']');
            flash('¡Error! '. $e->getMessage(), 'danger');
        }
        return back();
    }
}
