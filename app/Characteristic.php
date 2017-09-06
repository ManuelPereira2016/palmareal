<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $table = 'characteristics';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name'
    ];
}
