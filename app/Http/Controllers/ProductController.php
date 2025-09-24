<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   // 🟢 List semua produk
    public function index()
    {
        $products = \App\Models\Product::latest()->paginate(12);
        $categories = Category::all();
        return view('customer.products.index', compact('products', 'categories'));
    }


    // 🟢 Detail produk
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        $product = Product::with(['category', 'feedbacks.user'])->findOrFail($id);
        return view('customer.products.show', compact('product', 'categories'));
    }

}
