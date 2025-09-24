<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $fillable = [
        'category_id', 'name', 'description', 'price', 'stock', 'image'
    ];

    // 🔗 Relasi
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'product_id');
    }
}
