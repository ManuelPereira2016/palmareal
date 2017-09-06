<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Tag;
use PalmaReal\Historical;
use Auth;
use Log;

class TagController extends Controller
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
                       
            Tag::create($request -> all());

 			Historical::insert([
                'transaction' => 1, 
                'description' => 'Tag '.Tag::all()->last()->id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Log::info('Proceso exitoso en TagController -> Store');
            flash('Tag agregado exitosamente', 'success');
        }catch (\Exception $e) {
            Log::error('Error en TagController -> Store. Error: ['.$e.']');
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
                       
            Tag::where('id', $id)->delete();

 			Historical::insert([
                'transaction' => 1, 
                'description' => 'Tag '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            Log::info('Proceso exitoso en TagController -> Store');
            flash('Tag eliminado exitosamente', 'success');
        }catch (\Exception $e) {
            Log::error('Error en TagController -> Store. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return back();
    }
}
