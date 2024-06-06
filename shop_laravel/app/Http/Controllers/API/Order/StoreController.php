<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required',
            'products' => 'required|array',
        ]);

        $user = User::firstOrCreate([
            'email' => $validatedData['user_email'],
            'name' => $validatedData['user_name'],
            'password' => '12345'
        ]);

        $order = Order::create([
            'user_id' => $user->id
        ]);


        foreach ($validatedData['products'] as $orderProductData) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $orderProductData['id'],
                'product_count' => $orderProductData['qty'],
            ]);
        }

        return response()->json(['message' => 'Заказ успешно создан'], 201);
    }
}