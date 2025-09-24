@extends('customer.layout') {{-- ganti sesuai nama file layout di atas, misalnya customer/layout.blade.php --}}

@section('content')
@if(session('success'))
    <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
        {{ session('success') }}
    </div>
@endif
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-extrabold text-gray-800 mb-6">👤 Profil Saya</h1>

    @if(session('status'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="font-semibold text-gray-700">Username</p>
            <p class="text-gray-600">{{ $user->username }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Email</p>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Tanggal Lahir</p>
            <p class="text-gray-600">{{ $user->date_of_birth }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Jenis Kelamin</p>
            <p class="text-gray-600">{{ ucfirst($user->gender) }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Alamat</p>
            <p class="text-gray-600">{{ $user->address }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Kota</p>
            <p class="text-gray-600">{{ $user->city }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">No. Kontak</p>
            <p class="text-gray-600">{{ $user->contact_no }}</p>
        </div>
        <div>
            <p class="font-semibold text-gray-700">Paypal ID</p>
            <p class="text-gray-600">{{ $user->paypal_id }}</p>
        </div>
    </div>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route('profile.edit') }}"
           class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow">
           ✏️ Edit Profil
        </a>

        <a href="{{ route('shops.request') }}"
           class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow">
           🏬 Ajukan Toko
        </a>
    </div>
</div>

@endsection
