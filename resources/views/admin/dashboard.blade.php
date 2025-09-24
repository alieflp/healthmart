@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">📊 Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded-lg shadow text-center">
        <h2 class="text-lg font-semibold">Products</h2>
        <p class="text-2xl font-bold text-green-600">{{ $totalProducts ?? 0 }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow text-center">
        <h2 class="text-lg font-semibold">Orders</h2>
        <p class="text-2xl font-bold text-green-600">{{ $totalOrders ?? 0 }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow text-center">
        <h2 class="text-lg font-semibold">Users</h2>
        <p class="text-2xl font-bold text-green-600">{{ $totalUsers ?? 0 }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow text-center">
        <h2 class="text-lg font-semibold">Revenue</h2>
        <p class="text-2xl font-bold text-green-600">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
    </div>
</div>
@endsection
