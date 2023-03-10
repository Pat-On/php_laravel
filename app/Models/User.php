<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one to one relationship
    public function post()
    {
        return $this->hasOne('App\Models\Post', 'user_id');
    }

    // one to many
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    // accessors - get<NameOfTheColumn>Attribute
    public function getNameAttribute($value)
    {
        return ucfirst($value).' '.'Added val';
    }

    // mutator - before we are going to send data to db
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
