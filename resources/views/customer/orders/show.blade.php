{{-- resources/views/customer/orders/show.blade.php --}}
@extends('customer.layout')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 flex items-center gap-2">
        📦 Detail Pesanan
    </h1>

    {{-- Informasi Order --}}
    <div class="bg-white shadow-lg rounded-2xl p-6 mb-8 border-t-4 border-green-500">
        <h2 class="text-xl font-bold text-gray-800 mb-4">📝 Informasi Pesanan</h2>
        <div class="grid md:grid-cols-2 gap-4 text-gray-700">
            <p><span class="font-semibold">ID Order:</span> #{{ $order->id }}</p>
            <p><span class="font-semibold">Tanggal:</span> {{ $order->created_at->format('d M Y H:i') }}</p>
            <p>
                <span class="font-semibold">Status:</span> 
                <span class="px-3 py-1 rounded-full text-sm font-semibold text-white
                    @if($order->status == 'pending') bg-yellow-500 
                    @elseif($order->status == 'shipped') bg-blue-500
                    @elseif($order->status == 'canceled') bg-red-500
                    @else bg-green-600 @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p><span class="font-semibold">Metode Pembayaran:</span> {{ ucfirst($order->payment_method) }}</p>
            <p class="md:col-span-2"><span class="font-semibold">Total Harga:</span> 
                <span class="text-green-600 font-extrabold">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </span>
            </p>
        </div>
    </div>

    {{-- Item Pesanan --}}
    <div class="bg-white shadow-lg rounded-2xl p-6 mb-8 border-t-4 border-green-500">
        <h2 class="text-xl font-bold text-gray-800 mb-4">🛍️ Produk Dipesan</h2>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border px-4 py-3 text-left">Produk</th>
                        <th class="border px-4 py-3">Jumlah</th>
                        <th class="border px-4 py-3">Harga Satuan</th>
                        <th class="border px-4 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($order->items as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-3">{{ $item->product->name }}</td>
                        <td class="border px-4 py-3 text-center">{{ $item->quantity }}</td>
                        <td class="border px-4 py-3 text-center">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-3 text-center font-semibold text-green-600">
                            Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex gap-4">
        <a href="{{ route('orders.index') }}" 
           class="bg-gray-600 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-700 transition">
           ⬅️ Kembali
        </a>

        @if($order->status == 'pending')
        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" 
              onsubmit="return confirm('Yakin ingin batalkan pesanan?')">
            @csrf
            @method('PUT')
            <button type="submit" 
                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2 rounded-lg font-semibold shadow hover:from-red-600 hover:to-red-700 transition">
                ❌ Batalkan Pesanan
            </button>
        </form>
        @endif
    </div>
</div>
@endsection
