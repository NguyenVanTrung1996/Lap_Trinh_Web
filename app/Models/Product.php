<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category',
        'price',
        'description',
        'rated',
        'comment',
        'avatar',
        'status',
    ];

    function comment()
    {
        return $this->hasMany(Comment::class);
    }

    function order_detail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    function cart()
    {
        return $this->belongsToMany(Cart::class);
    }
}
