<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil data ringkasan untuk dashboard
        $totalUsers   = User::count();
        $totalOrders  = Order::count();
        $totalProducts = Product::count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalUsers', 'totalOrders', 'totalProducts', 'recentOrders'));
    }
}