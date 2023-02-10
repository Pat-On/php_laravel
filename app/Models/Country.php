<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // has many we are relating here posts with user by user_id and country_id
    public function posts(){
        // this method uses two tables
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User', 'country_id', 'user_id');
    }
}
