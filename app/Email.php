<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
   	protected $table = 'emails';
    protected $primarykey = 'id';
    protected $fillable = [    	
    	'id', 'subject', 'message', 'to', 'from', 'phone', 'name'
    ];

}
