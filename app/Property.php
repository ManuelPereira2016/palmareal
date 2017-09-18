<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;
use PalmaReal\Admin;
use PalmaReal\Media;
use Laravel\Scout\Searchable;

class Property extends Model
{
    protected $table = 'properties';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'name', 'description', 'city', 'location', 'modality', 'code', 'proximities', 'characteristics', 'tags', 'admin', 'size', 'rooms', 'bathrooms', 'garages', 'antiquity', 'price', 'views', 'status'
    ];
    protected $with = array('types');
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
        return [
             'id' => $this->id,
             'name' => $this->name,
             'city' => $this->city,
             'location' => $this->location,
             'characteristics' => $this->characteristics,
             'tags' => $this->tags,
             'proximities' => $this->proximities,
             'code' => $this->code,
             'description' => $this->description
        ];
    }
}