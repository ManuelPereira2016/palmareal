<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class PropertyComments extends Model
{
    protected $table = 'property_comments';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'property_id', 'content', 'email', 'name'
    ];
}