<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';


    /**
     * The users that belong to the role.
     */    
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role');
    }
}
