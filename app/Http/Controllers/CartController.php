<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    // 🟢 Lihat isi cart user
 public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('customer.cart.index', compact('cartItems'));
    }

    public function store(Request $request, $productId)
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $productId)
                    ->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
public function update(Request $request, $id)
{
    $cartItem = Cart::findOrFail($id);

    $cartItem->quantity = $request->quantity;
    $cartItem->save();

    $subtotal = $cartItem->product->price * $cartItem->quantity;

    $total = Cart::with('product')->get()->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return response()->json([
        'success'  => true,
        'subtotal' => $subtotal,
        'total'    => $total
    ]);
}

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->user_id === Auth::id()) {
            $cart->delete();
        }
        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }
}
