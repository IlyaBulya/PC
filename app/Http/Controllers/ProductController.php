<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // список товаров (каталог)
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(9);

        return view('products.index', compact('products'));
    }

    // страница одного товара
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
