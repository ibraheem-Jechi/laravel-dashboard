<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show welcome page with products
    public function welcome()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    // Store new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'img'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('products', 'public');
        }

        Product::create([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? '',
            'price'       => $validated['price'],
            'img'         => $imgPath,
        ]);

        return redirect()->route('welcome')->with('success', 'Product added successfully!');
    }
}
