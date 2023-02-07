<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Post - is going to define name of our table
class Post extends Model
{
    use HasFactory;


    // protected $table = 'postadmins'; 

    protected $primaryKey = 'id'; // default, so if you want to have different name, just overwrite it
}
