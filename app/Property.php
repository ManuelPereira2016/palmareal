<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;
use PalmaReal\Admin;
use Laravel\Scout\Searchable;

class Property extends Model
{
    protected $table = 'properties';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name', 'description', 'location', 'modality', 'code', 'proximities', 'characteristics', 'tags', 'admin', 'size', 'rooms', 'bathrooms', 'garages', 'antiquity', 'price', 'views', 'status'
    ];
    use Searchable;
    
    public function admin()
    {
        return $this->belongTo(Admin::class);
    }

    public function types()
    {
        return $this->belongsToMany('PalmaReal\PropertyTypes', 'properties_types_relations', 'property_id', 'properties_type_id');
    }

    public function scopeSearch($query , $request){ 

        if (empty($request -> name)) {
            $consult = $query 
            -> where('status', 1) ;           

            if (!empty($request -> tags)) {
                foreach ($request -> tags as $key => $element) {
                   if ($key == 0) {
                       $consult -> where('tags', 'LIKE', '%'. $element .'%');
                   }else{
                        $consult -> orWhere('tags', 'LIKE', '%'. $element .'%');
                   }

                } 
            }

            return $consult -> paginate(12);
        }else{
            $consult = $query -> where('status', 1)
            -> where('name', 'LIKE', '%'.$request -> name.'%')
            -> orWhere('description', 'LIKE', '%'.$request -> name.'%') ; 

                if (!empty($request -> tags)) {
                    foreach ($request -> tags as $key => $element) {
                       
                            $consult -> orWhere('tags', 'LIKE', '%'. $element .'%');
                       

                    }
                }
           
            return $consult  -> orderBy('name', 'asc') -> paginate(12);
        }        
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...
        return $array;
    }
}
