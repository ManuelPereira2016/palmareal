<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Proximity extends Model
{
    protected $table = 'proximities';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name'
    ];
}
