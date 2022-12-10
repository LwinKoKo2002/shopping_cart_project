<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function add_to_cart()
    {
        return $this->belongsTo(AddToCart::class, 'add_to_cart_id');
    }
}
