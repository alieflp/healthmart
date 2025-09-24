<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    // --- ADMIN ---

    public function AdminIndex()
    {
        $shops = Shop::all();
        return view('admin.shops.index', compact('shops'));
    }

    public function create()
    {
        return view('admin.shops.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
            'user_id'   => 'required|exists:users,id',
            'status'    => 'in:pending,approved,rejected',
        ]);

        Shop::create($validated);

        return redirect()->route('customer.shops.index')->with('success', 'Shop berhasil dibuat.');
    }
    public function index()
    {
        $shops = Shop::where('user_id', auth::id())->get();
        return view('customer.shops.index', compact('shops'));
    }
    public function show(Shop $shop)
    {
        return view('admin.shops.show', compact('shop'));
    }

    public function edit(Shop $shop)
    {
        return view('admin.shops.edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
            'status'    => 'in:pending,approved,rejected',
        ]);

        $shop->update($validated);

        return redirect()->route('admin.shops.index')->with('success', 'Shop berhasil diperbarui.');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('admin.shops.index')->with('success', 'Shop berhasil dihapus.');
    }

    // --- CUSTOMER ---

    public function requestForm()
    {
        return view('customer.shops.request');
    }

    public function requestStore(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status']  = 'pending';

        Shop::create($validated);

        return redirect()->route('profile.index')
            ->with('success', 'Pengajuan toko berhasil dikirim, tunggu persetujuan admin.');
    }
}
