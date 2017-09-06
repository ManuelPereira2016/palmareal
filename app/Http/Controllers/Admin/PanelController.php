<?php
namespace PalmaReal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PalmaReal\Http\Controllers\Controller;
use PalmaReal\Email;
use PalmaReal\Property;
use PalmaReal\Admin;
use PalmaReal\Historical;
use PalmaReal\Map;
use PalmaReal\Type;

class PanelController extends Controller
{
    
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')->paginate(5);
        $num_propiedades = Property::count();
        $num_users = Admin::count();
        $maps = Map::where('id', 1)->first();
       	return view('admin.index')->with(['emails' => $emails, 'num_propiedades' => $num_propiedades, 'num_users' => $num_users, 'maps' => $maps]);       	
    }

    public function historical(){
    	 $historical = Historical::select('historical.*', 'admins.first_name', 'admins.last_name')
        ->join('admins', 'admins.id', 'historical.user')
        ->orderBy('created_at', 'desc')
        ->get();

       	return view('admin.historial')->with(['historical' => $historical]);
    }
    public function changeMap(Request $request, $id){
        Map::where('id', $id)->update([
          'latitude' => $request -> latitude,
          'longitude' => $request -> longitude,
        ]);

        return back();
    }
}
