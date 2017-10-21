<?php

namespace App\Models;

use Carbon\Carbon;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'title',
        'rated',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getCreatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('d/m/Y - h:ia'); //Change the format to whichever you desire
    }
}
