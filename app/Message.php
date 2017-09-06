<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   	protected $table = 'messages';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'subject', 'message', 'name', 'email', 'phone', 'status'
    ];
}
