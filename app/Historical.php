<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Historical extends Model
{
    protected $table = 'historical';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'transaction', 'description', 'user'
    ];
}
