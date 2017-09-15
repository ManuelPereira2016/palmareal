<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class BestProperties extends Model
{
    protected $table = 'best_properties';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'property_id', 'avg'
    ];
}