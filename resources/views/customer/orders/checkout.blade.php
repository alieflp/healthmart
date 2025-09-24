@extends('customer.layout')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg p-8 rounded-2xl">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">🧾 Checkout</h2>

    <form action="{{ route('orders.process') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Tabel Produk -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left px-4 py-2">Produk</th>
                        <th class="text-center px-4 py-2">Qty</th>
                        <th class="text-right px-4 py-2">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php 
                            $subtotal = $item->product->price * $item->quantity; 
                            $total += $subtotal;
                        @endphp
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $item->product->name }}</td>
                            <td class="text-center px-4 py-3">{{ $item->quantity }}</td>
                            <td class="text-right px-4 py-3 text-green-600 font-semibold">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-gray-50 font-bold text-lg">
                        <td colspan="2" class="text-right px-4 py-3">Total:</td>
                        <td class="text-right px-4 py-3 text-green-700">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label class="font-semibold block mb-2 text-gray-700">💳 Metode Pembayaran</label>
            <select name="payment_method" 
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-400 focus:outline-none">
                <option value="debit">Debit</option>
                <option value="credit">Kartu Kredit</option>
                <option value="cod">Cash on Delivery</option>
            </select>
        </div>

        <!-- Tombol Konfirmasi -->
        <button type="submit"
            class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-4 rounded-xl text-lg font-bold hover:from-green-600 hover:to-green-700 shadow-lg transition">
            Checkout
        </button>
    </form>
</div>
@endsection
