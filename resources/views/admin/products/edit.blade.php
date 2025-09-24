@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">✏️ Edit Produk</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium">Nama Produk</label>
        <input type="text" name="name" value="{{ $product->name }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
    </div>
    <div>
        <label class="block font-medium">Kategori</label>
        <select name="category_id" class="w-full border-gray-300 rounded-lg shadow-sm">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block font-medium">Harga</label>
        <input type="number" name="price" value="{{ $product->price }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
    </div>
    <div>
        <label class="block font-medium">Stok</label>
        <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
    </div>
    <div>
        <label class="block font-medium">Gambar</label>
        <input type="file" name="image" class="w-full border-gray-300 rounded-lg shadow-sm">
        @if($product->image_url)
            <img src="{{ $product->image_url }}" class="w-32 h-32 object-cover mt-2 rounded">
        @endif
    </div>
    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Update</button>
</form>
@endsection
