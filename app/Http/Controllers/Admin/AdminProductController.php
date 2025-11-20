<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string|max:255',
            'available_colors' => 'nullable|string',
            'type' => 'required|string|max:50',
            'category' => 'required|string|max:100',
        ]);

        $colors = null;
        if (!empty($data['available_colors'])) {
            $colors = array_values(array_filter(array_map('trim', explode(',', $data['available_colors']))));
        }
        $data['available_colors'] = $colors;

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string|max:255',
            'available_colors' => 'nullable|string',
            'type' => 'required|string|max:50',
            'category' => 'required|string|max:100',
        ]);

        $colors = null;
        if (!empty($data['available_colors'])) {
            $colors = array_values(array_filter(array_map('trim', explode(',', $data['available_colors']))));
        }
        $data['available_colors'] = $colors;

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted.');
    }
}
