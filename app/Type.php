<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name'
    ];

}
