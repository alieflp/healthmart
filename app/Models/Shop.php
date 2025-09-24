<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['user_id', 'shop_name', 'status'];

    // 🔗 Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
