<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'page', 'name', 'description', 'link', 'image'
    ];
}
