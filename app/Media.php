<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	protected $table = 'media';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'table', 'item', 'url'
    ];
    
}
