@extends('admin.layout')

@section('content')
<div class="bg-white shadow rounded-2xl p-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">🛒 Daftar Orders</h1>

    <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">User</th>
                <th class="px-4 py-3 text-left">Total</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Tanggal</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->user->name ?? '-' }}</td>
                    <td class="px-4 py-3 font-bold text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            @if($order->status == 'pending') bg-yellow-100 text-yellow-700 
                            @elseif($order->status == 'shipped') bg-blue-100 text-blue-700 
                            @elseif($order->status == 'canceled') bg-red-100 text-red-700 
                            @else bg-green-100 text-green-700 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded shadow">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
