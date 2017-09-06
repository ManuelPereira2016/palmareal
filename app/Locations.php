<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = 'locations';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name', 'code'
    ];
}