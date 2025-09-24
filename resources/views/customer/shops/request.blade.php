@extends('customer.layout')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-extrabold text-gray-800 mb-6">🏬 Ajukan Pembukaan Toko</h1>

    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('shops.request.store') }}" method="POST" 
          class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label class="block font-medium text-gray-700">Nama Toko</label>
                <input type="text" name="shop_name" value="{{ old('shop_name') }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow">
                🚀 Ajukan Toko
            </button>
        </div>
    </form>
</div>
@endsection
