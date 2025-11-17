<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('success', 'Cart is empty.');
        }

        $user = $request->user();

        // считаем total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // создаём заказ
        $order = Order::create([
            'user_id' => $user->id,
            'total'   => $total,
            'status'  => 'pending',
        ]);

        // создаём позиции
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'qty'        => $item['qty'],
                'price'      => $item['price'],
                'color'      => $item['color'],
                'design'     => $item['design'],
            ]);
        }

        // чистим корзину
        session()->forget('cart');

        return redirect()
            ->route('orders.show', $order)
            ->with('success', 'Order created successfully.');
    }
}

 
