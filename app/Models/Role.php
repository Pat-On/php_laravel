<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    // that table role_user table is going to be handle automatically 
    // if we are going to follow the convention
    // looks nice

    public function users(){
        return $this->belongsToMany('App\Models\user');
    }
}
