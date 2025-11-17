<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // показать корзину
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return view('cart.index', [
            'cart'  => $cart,
            'total' => $total,
        ]);
    }

    // добавить в корзину
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'qty'    => 'required|integer|min:1',
            'color'  => 'nullable|string',
            'design' => 'nullable|string|max:255',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty'] += (int) $request->qty;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name'       => $product->name,
                'price'      => $product->price,
                'qty'        => (int) $request->qty,
                'color'      => $request->color,
                'design'     => $request->design,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Product added to cart.');
    }

    // удалить из корзины
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Item removed from cart.');
    }
}
