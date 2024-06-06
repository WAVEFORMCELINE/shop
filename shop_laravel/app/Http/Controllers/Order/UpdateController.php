<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'user_id' => $validated['user_id'],
        ]);

        $order->products()->delete();

        foreach ($validated['products'] as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }

        return response()->json(['order' => $order], 200);
    }
}
