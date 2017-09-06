<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Historical;
use PalmaReal\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();        
        return view('admin.mensajes.index')->with(['messages' => $messages]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::FindOrFail($id);
        if ($message -> status == 0) {
            Message::where('id', $id) -> update(['status' => 1]);
        }
        return view('admin.mensajes.show')->with(['message' => $message]);
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
            $message = Message::FindOrFail($id);
            
            Message::destroy($id);
            Historical::insert([
                'transaction' => 3, 
                'description' => 'Mensaje '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            Log::info('Registro exitoso en MessageController -> destroy');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en MessageController -> destroy. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return back();
    }
}
