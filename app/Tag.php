<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name'
    ];
}
