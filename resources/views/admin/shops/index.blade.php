@extends('admin.layout')

@section('content')
<div class="bg-white shadow rounded-2xl p-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">🏬 Daftar Toko</h1>

    <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Nama Toko</th>
                <th class="px-4 py-3 text-left">Pemilik</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shops as $shop)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $shop->name }}</td>
                    <td class="px-4 py-3">{{ $shop->owner->name ?? '-' }}</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full text-sm font-medium
                            @if($shop->status == 'approved') bg-green-100 text-green-700
                            @elseif($shop->status == 'pending') bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ ucfirst($shop->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.shops.edit', $shop->id) }}" 
                           class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded shadow">
                            ✏️ Edit
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
