{{-- resources/views/customer/orders/index.blade.php --}}
@extends('customer.layout')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8 flex items-center gap-2">
        📦 Daftar Pesanan Saya
    </h1>

    @if($orders->isEmpty())
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-5 rounded-lg shadow">
            Belum ada pesanan yang dibuat.
        </div>
    @else
        <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-gradient-to-r from-green-100 to-green-200 text-gray-800 text-left">
                    <tr>
                        <th class="px-6 py-3">#ID</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Total Harga</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-bold text-gray-900">#{{ $order->id }}</td>
                        <td class="px-6 py-4">{{ $order->created_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-4 font-semibold text-green-600">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full shadow 
                                @if($order->status == 'pending') bg-yellow-500 text-white 
                                @elseif($order->status == 'shipped') bg-blue-500 text-white
                                @elseif($order->status == 'canceled') bg-red-500 text-white
                                @else bg-green-600 text-white @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('orders.show', $order->id) }}" 
                               class="inline-block bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg shadow hover:from-blue-600 hover:to-blue-700 transition">
                                🔍 Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
