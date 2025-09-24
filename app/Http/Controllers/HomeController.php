<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        // Ambil semua kategori
        $categories = Category::all();

        // Ambil 6 produk terbaru
        $products = Product::latest()->take(6)->get();

        return view('welcome', compact('categories', 'products'));
    }
}
