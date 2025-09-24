@extends('admin.layout')

@section('content')
<div class="bg-white shadow rounded-2xl p-6">
    <!-- Judul -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-700">📄 Detail Order #{{ $order->id }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg shadow text-gray-700 font-semibold">
            ⬅️ Kembali
        </a>
    </div>

    <!-- Informasi Order -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gradient-to-br from-teal-50 to-amber-50 rounded-xl shadow p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">👤 Informasi Customer</h2>
            <p><span class="font-semibold">Nama:</span> {{ $order->user->name ?? '-' }}</p>
            <p><span class="font-semibold">Email:</span> {{ $order->user->email ?? '-' }}</p>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-lime-50 rounded-xl shadow p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">🧾 Detail Order</h2>
            <p><span class="font-semibold">Tanggal:</span> {{ $order->created_at->format('d M Y H:i') }}</p>
            <p><span class="font-semibold">Metode Pembayaran:</span> {{ strtoupper($order->payment_method) }}</p>
            <p><span class="font-semibold">Total Harga:</span> 
                <span class="font-bold text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </p>
            <p><span class="font-semibold">Status:</span>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    @if($order->status == 'pending') bg-yellow-100 text-yellow-700
                    @elseif($order->status == 'shipped') bg-blue-100 text-blue-700
                    @elseif($order->status == 'canceled') bg-red-100 text-red-700
                    @else bg-green-100 text-green-700 @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
        </div>
    </div>

    <!-- Item Produk -->
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-4">🛒 Produk dalam Order</h2>
        <table class="w-full border-collapse bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">Produk</th>
                    <th class="px-4 py-3 text-left">Harga</th>
                    <th class="px-4 py-3 text-left">Qty</th>
                    <th class="px-4 py-3 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $item->product->name ?? '-' }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">{{ $item->quantity }}</td>
                    <td class="px-4 py-3 font-bold text-green-600">
                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Update Status -->
    <div class="mt-8 bg-gradient-to-br from-teal-50 to-amber-50 shadow p-6 rounded-xl">
        <h2 class="text-lg font-bold text-gray-800 mb-4">⚙️ Update Status Order</h2>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flex gap-4 items-center">
            @csrf
            @method('PUT')
            <select name="status" class="border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow">
                💾 Simpan
            </button>
        </form>
    </div>
</div>
@endsection
