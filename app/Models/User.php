<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'phone',
        'address',
        'level',
        'avatar',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    function comment()
    {
        return $this->hasMany(Comment::class);
    }

    function order()
    {
        return $this->hasMany(Order::class);
    }

    function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
