<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = $request->user()
            ->orders()
            ->latest()
            ->with('items.product')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Request $request, Order $order)
    {
        // защита: показываем только свои заказы
        abort_if($order->user_id !== $request->user()->id, 403);

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}

 
