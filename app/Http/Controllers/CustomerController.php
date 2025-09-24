<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        $products   = Product::with('category')->latest()->take(12)->get();

        return view('customer.home', compact('categories','products'));
    }
}
