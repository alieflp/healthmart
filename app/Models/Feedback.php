<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = ['order_id', 'user_id', 'product_id', 'comment', 'rating'];

    // 🔗 Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

        public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
