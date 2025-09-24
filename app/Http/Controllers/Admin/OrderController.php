<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 🟢 Lihat semua pesanan (Admin)
    public function index()
    {
        $orders = Order::with('user', 'items.product')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // 🟢 Detail pesanan (Admin)
    public function show($id)
    {
        $order = Order::with('user', 'items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // 🟢 Tandai pesanan sebagai dikirim
    public function ship($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan sudah diproses.');
        }

        $order->update(['status' => 'shipped']);

        return redirect()->route('admin.orders.index')
        ->with('success', 'Pesanan berhasil dikirim.');
    }

    // (Opsional) Batalkan pesanan dari admin
    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status === 'shipped') {
            return redirect()->back()->with('error', 'Pesanan sudah dikirim, tidak bisa dibatalkan.');
        }

        $order->update(['status' => 'canceled']);

        return redirect()->route('admin.orders.index')
        ->with('success', 'Pesanan berhasil dibatalkan.');
    }
      public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,shipped,canceled,completed'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $id)
        ->with('success', 'Status pesanan diperbarui.');
    }
}
