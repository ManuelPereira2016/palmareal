<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organization';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'phone_contact', 'email_contact', 'title_main', 'updated_at'
    ];
}