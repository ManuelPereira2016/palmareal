<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class PropertyTypes extends Model
{
    protected $table = 'properties_types';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name'
    ];
}