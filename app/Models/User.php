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

    // many to many
    public function roles()
    {

        // withPivot is defining what we are going to bring from database from the pivot - so we need to inform model
        return $this->belongsToMany('App\Models\Role')->withPivot('created_at', 'user_id', 'role_id');

        // if you are not follow convention of php you will have to use the thing bellow:
        // to customize tables name and columns follow the format bellow
        // return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }
}
