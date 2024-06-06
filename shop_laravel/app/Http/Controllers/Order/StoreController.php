<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // предполагаем, что у вас есть таблица users
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'user_id' => $validated['user_id'],
        ]);

        foreach ($validated['products'] as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }
    }
}
