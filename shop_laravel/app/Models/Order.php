<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $guarded = false;
    protected $fillable=[
        'user_id',
    ];
    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function productsPrice(){
        $totalPrice = 0;
        foreach ($this->products as $orderProduct) {
            $product = $orderProduct->product;
            if ($product) {
                $totalPrice += $product->price * $orderProduct->product_count;
            }
        }
        return $totalPrice;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
