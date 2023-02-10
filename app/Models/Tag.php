<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    //     //polymorphic relation many to many
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'taggable');
    }

    //     //polymorphic relation many to many
    public function videos()
    {
        return $this->morphedByMany('App\Models\Videos', 'taggable');
    }
}
