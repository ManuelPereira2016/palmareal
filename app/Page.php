<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'title', 'subtitle', 'description', 'content', 'author'
    ];
}
