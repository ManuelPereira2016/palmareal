<?php

namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Email;

class EmailController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $email = Email::FindOrFail($id);
        if ($email -> estatus == 0) {
            $email -> update(['estatus' => 1]);
        }
        return view('admin.Emails.show')->with('email', $email);
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
            Email::destroy($id);
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }

        return redirect('admin');
    }
}
