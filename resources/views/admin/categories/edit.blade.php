@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">✏️ Edit Kategori</h1>

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium">Nama Kategori</label>
        <input type="text" name="name" value="{{ $category->name }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
    </div>
    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Update</button>
</form>
@endsection
