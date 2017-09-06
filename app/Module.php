<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name', 'description'
    ];
}
