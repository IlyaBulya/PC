<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSettings;
use App\Models\Product;

class AdminHomeSettingsController extends Controller
{
    public function edit()
    {
        $settings = HomeSettings::first();
        if (!$settings) {
            $settings = new HomeSettings([
                'hero_product_id' => null,
                'featured_product_ids' => [],
            ]);
        }
        $products = Product::orderBy('name')->get();
        return view('admin.home.edit', compact('settings', 'products'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'hero_product_id' => ['nullable', 'exists:products,id'],
            'featured_product_ids' => ['nullable', 'array', 'max:6'],
            'featured_product_ids.*' => ['exists:products,id'],
        ]);

        $settings = HomeSettings::first() ?? new HomeSettings();
        $settings->hero_product_id = $data['hero_product_id'] ?? null;
        $settings->featured_product_ids = $data['featured_product_ids'] ?? [];
        $settings->save();

        return redirect()->route('admin.home.edit')->with('success', 'Home settings saved.');
    }
}
