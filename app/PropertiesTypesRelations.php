<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class PropertiesTypesRelations extends Model
{
    protected $table = 'properties_types_relations';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'property_id', 'properties_type_id'
    ];
}