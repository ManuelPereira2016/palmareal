<?php

namespace PalmaReal;

use Illuminate\Database\Eloquent\Model;

class RoleModule extends Model
{
    protected $table = 'roles_modules';
    protected $primarykey = 'id';
    protected $fillable = [
    	'id', 'fk_id_role', 'fk_id_module'
    ];
}
