<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Post - is going to define name of our table
class Post extends Model
{
    use HasFactory;
    // use SoftDeletes; // <- it is adding entire soft delete logic even to queries!

    // protected $table = 'postadmins';

    protected $primaryKey = 'id'; // default, so if you want to have different name, just overwrite it

    // protected $dates = ['deleted_at'];

    // allowing mass assignment operations
    // https://codewithtravel.medium.com/laravel-mass-assignment-guarded-or-fillable-7c3a64b49ca6#:~:text=Mass%20assignment%20is%20a%20process,certain%20security%20problems%20behind%20it.
    protected $fillable = [
        'title',
        'content',
    ];

    // inverse relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // // polymorphic relationship
    // public function photos()
    // {
    //     return $this->morphMany('\App\Models\Photo', 'imageable');
    // }

    //polymorphic relation many to many
    // public function tags()
    // {
    //     return $this->morphToMany('App\Models\Tag', 'taggable');
    // }
}
