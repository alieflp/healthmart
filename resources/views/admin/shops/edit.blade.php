@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">✏️ Edit Toko</h1>

<form action="{{ route('admin.shops.update', $shop->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md">
    @csrf @method('PUT')
    <div>
        <label class="block font-medium">Nama Toko</label>
        <input type="text" name="name" value="{{ $shop->name }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
    </div>
    <div>
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm">
            <option value="pending" {{ $shop->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ $shop->status == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ $shop->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>
    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Update</button>
</form>
@endsection
