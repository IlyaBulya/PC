<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // /products — большие квадраты типов
    public function types()
    {
        $rawTypes = Product::select('type')->distinct()->pluck('type');

        // Настроим красивые названия + цвета
        $meta = [
            'pc'       => ['label' => 'PC',        'gradient' => 'from-cyan-400 via-cyan-500 to-sky-700'],
            'mouse'    => ['label' => 'Mice',      'gradient' => 'from-fuchsia-500 via-purple-600 to-indigo-700'],
            'keyboard' => ['label' => 'Keyboards', 'gradient' => 'from-amber-400 via-orange-500 to-rose-500'],
            'gpu'      => ['label' => 'GPUs',      'gradient' => 'from-emerald-400 via-teal-500 to-cyan-600'],
            'headset'  => ['label' => 'Headsets',  'gradient' => 'from-pink-500 via-rose-500 to-red-500'],
        ];

        $types = $rawTypes->map(function ($type) use ($meta) {
            $key = strtolower($type);

            return [
                'type'     => $type,
                'label'    => $meta[$key]['label']    ?? Str::headline($type),
                'gradient' => $meta[$key]['gradient'] ?? 'from-zinc-600 to-zinc-900',
            ];
        });

        return view('products.types', compact('types'));
    }

    // /products/type/{type} — список товаров данного типа
    public function byType(string $type)
    {
        $products = Product::where('type', $type)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('products.index', [
            'products' => $products,
            'type'     => $type,
        ]);
    }

    // список товаров (каталог)
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products'));
    }

    // страница одного товара
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
