<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class GoogleMapsLocations extends Model
{
    protected $table = 'googlemaps_locations';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'property_id', 'address', 'longitude', 'latitude', 'ratio'
    ];
}