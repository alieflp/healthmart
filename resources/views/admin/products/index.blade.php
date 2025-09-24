@extends('admin.layout')

@section('content')
<div class="bg-white shadow rounded-2xl p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-green-700">📦 Daftar Produk</h1>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700">
            ➕ Tambah Produk
        </a>
    </div>

    <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Kategori</th>
                <th class="px-4 py-3 text-left">Harga</th>
                <th class="px-4 py-3 text-left">Stok</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                <td class="px-4 py-3">{{ $product->name }}</td>
                <td class="px-4 py-3">{{ $product->category->name ?? '-' }}</td>
                <td class="px-4 py-3 font-bold text-green-600">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </td>
                <td class="px-4 py-3">{{ $product->stock }}</td>
                <td class="px-4 py-3 text-center flex justify-center gap-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                       class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded shadow">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" 
                          onsubmit="return confirm('Hapus produk?')">
                        @csrf @method('DELETE')
                        <button type="submit" 
                                class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded shadow">
                            🗑️ Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
