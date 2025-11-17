<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
	public function index()
	{
		// Возьмём 3 ПК как “featured builds”
		$featured = Product::where('type', 'pc')
			->orderBy('price', 'desc')
			->take(3)
			->get();

		return view('home', compact('featured'));
	}
}

 
