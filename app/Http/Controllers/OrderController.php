<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong');
        }

        return view('customer.orders.checkout', compact('cartItems'));
    }

    /**
     * 🟢 Proses checkout dari Blade (WEB)
     */
    public function processCheckout(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:debit,credit,cod'
        ]);

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);

            // kurangi stok
            $item->product->decrement('stock', $item->quantity);
        }

        // kosongkan keranjang
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * 🟢 Lihat semua order user (WEB)
     */
    public function index()
    {
        $orders = Order::with('items.product')->where('user_id', Auth::id())->latest()->get();
        return view('customer.orders.index', compact('orders'));
    }

    /**
     * 🟢 Detail pesanan (WEB)
     */
    public function show($id)
    {
        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('customer.orders.show', compact('order'));
    }

    /**
     * 🟢 Batalkan pesanan (WEB)
     */
    public function cancel($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);

        if ($order->status == 'shipped') {
            return redirect()->back()->with('error', 'Pesanan sudah dikirim, tidak bisa dibatalkan.');
        }

        $order->update(['status' => 'canceled']);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibatalkan.');
    }

}

