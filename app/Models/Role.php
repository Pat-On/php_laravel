<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // inversion relationship
    public function users()
    {
        // pulling down fields?
        return $this->belongsToMany('App\Models\User');
    }
}
