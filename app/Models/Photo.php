<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function imageable()
    {
        return $this->morphTo();
    }

    // polymorphic relationship
    public function photos()
    {
        return $this->morphMany('\App\Models\Photo', 'imageable');
    }
}
