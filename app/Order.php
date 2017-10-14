<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'product_count',
        'note',
        'status',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
