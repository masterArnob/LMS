<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
