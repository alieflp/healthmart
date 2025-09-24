<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        protected $fillable = [
        'user_id', 'total_price', 'payment_method', 'status'
    ];

    // 🔗 Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
        public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

}
