<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'maps';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'description', 'latitude', 'longitude'
    ];
}
