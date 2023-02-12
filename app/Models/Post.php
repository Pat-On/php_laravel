<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // Permission to mass assignment so basically it is like telling to the Laravel
    // that is ok to save data to table
    protected $fillable = [
        'title',
        'body'
    ];

}
