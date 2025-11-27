<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\HomeSettings;

class HomeController extends Controller
{
	public function index()
	{
        $settings = HomeSettings::first();
        $hero = null;
        $featured = collect();

        if ($settings) {
            if ($settings->hero_product_id) {
                $hero = Product::find($settings->hero_product_id);
            }
            if (!empty($settings->featured_product_ids)) {
                $ids = $settings->featured_product_ids;
                $products = Product::whereIn('id', $ids)->get()->keyBy('id');
                foreach ($ids as $id) {
                    if (isset($products[$id])) {
                        $featured->push($products[$id]);
                    }
                }
            }
        }

        if ($featured->isEmpty()) {
            $featured = Product::where('type', 'pc')
                ->orderBy('price', 'desc')
                ->take(3)
                ->get();
        }

        return view('home', ['featured' => $featured, 'hero' => $hero]);
	}
}

 
