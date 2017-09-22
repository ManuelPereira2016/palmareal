<?php
namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Historical;
use PalmaReal\Admin;
use PalmaReal\Role;
use PalmaReal\Property;
use Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('status', 1)->get();
        return view('admin.admins.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = Role::where('id', '!=', 1)->get();
        return view('admin.admins.create')->with('roles', $roles);
    }

    /* Admins
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            Admin::insert([
                'first_name' =>  $request -> first_name,
                'last_name' =>  $request -> last_name,
                'email' =>  $request -> email,
                'username' =>  $request -> username,
                'usercode' =>  mt_rand(00000000, 99999999),
                'password' =>  bcrypt($request->password),
                'phone' =>  $request -> phone,
                'location' =>  $request -> location,
                'address' =>  $request -> address,
                'description' =>  $request -> description,
                'gender' =>  $request -> gender,
                'role' =>  $request -> role,
                'status' =>  $request -> status,
                'image'=>  null,
                'remember_token' => str_random(10),
                'created_at' => date('Y:m:d H:i:s'),
                'updated_at' => date('Y:m:d H:i:s'),
                ]);

            Historical::insert([
                'transaction' => 1, 
                'description' => 'Administrador '.Admin::all()->last()->id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
            Log::info('Registro exitoso en adminController -> Store');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en adminController -> Store. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');

        }
        return redirect()->route('administradores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::select('admins.*', 'roles.name as role')->join('roles', 'roles.id', 'admins.role')->where('admins.id', $id)->first();
        return view('admin.admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::where('id', '!=', 1)->get();
        $admin = Admin::FindOrFail($id);
        return view('admin.admins.edit')->with(['admin' => $admin, 'roles' => $roles]);
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
                'description' => 'Administrador '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]);
            Log::info('Registro exitoso en adminController -> update');
            flash('Proceso exitoso', 'success');
        }catch (\Exception $e) {
            Log::error('Error en adminController -> update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->route('administradores.index');
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
            $properties = Property::where('admin', $id)->get()->toArray();
            if (count($properties) > 0) {
                $columns = array_column($properties, 'name');
                $properties_list = implode('<br> <i class="fa fa-check"></i> ', $columns);

                flash('El usuario está vinculado con una o mas propiedades<br>
                    <div><i class="fa fa-check"></i> '. $properties_list .'</div>', 'success');
            }

            $admin = Admin::FindOrFail($id);
            $admin->status = 0;
            $admin->save();
            // if (Storage::disk('images')->has($admin -> imagen)) {
            //     Storage::disk('images')->delete($admin -> imagen);
            // }

            // Admin::destroy($id);
            Historical::insert([
                'transaction' => 3, 
                'description' => 'Administrador '.$id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                ]);
            Log::info('Registro exitoso en adminController -> destroy');
            flash('Proceso exitoso', 'success');

        }catch (\Exception $e) {
            Log::error('Error en adminController -> destroy. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return redirect()->route('administradores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id){
        try{
            if ($request -> status == 0) {$status = 1;}else{ $status = 0;}

            Admin::where('id', $id)
            ->update(['status' => $status]);
            
            Historical::insert([
                'transaction' => 4, 
                'description' => 'Administrador '. $id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
            Log::notice('Registro exitoso en propertyController -> Update');
            flash('Estatus cambiado exitosamente', 'success');
        }catch (\Exception $e) {
            Log::error('Error en propertyController -> Update. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, $id){
        try{
            $validator = Validator::make($request->all(), [
                'password' => 'required|string|min:6|confirmed'
                ]);

            if ($validator->fails()) {
                return redirect('/admin/administradores')
                ->withErrors($validator)
                ->withInput();
            }

            Admin::where('id', $id)
            ->update([
                'password' => bcrypt($request -> password)
                ]);

            Historical::insert([
                'transaction' => 2, 
                'description' => 'Cambio de contraseña al administrador '. $id, 
                'user' => Auth::user()->id, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
            Log::notice('Registro exitoso en AdminController -> changePassword');
            flash('Cambio de contraseña exitoso.', 'success');
        }catch (\Exception $e) {
            Log::error('Error en AdminController -> changePassword. Error: ['.$e.']');
            flash('¡Error! Ha ocurrido un problema', 'danger');
        }
        return back();
    }
}
