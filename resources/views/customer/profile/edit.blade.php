@extends('customer.layout')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-extrabold text-gray-800 mb-6">✏️ Edit Profil</h1>

    <form action="{{ route('profile.update') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium text-gray-700">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}"
                       class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block font-medium text-gray-700">Jenis Kelamin</label>
                <select name="gender" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block font-medium text-gray-700">Alamat</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Kota</label>
            <input type="text" name="city" value="{{ old('city', $user->city) }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block font-medium text-gray-700">No. Kontak</label>
            <input type="text" name="contact_no" value="{{ old('contact_no', $user->contact_no) }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block font-medium text-gray-700">Paypal ID</label>
            <input type="text" name="paypal_id" value="{{ old('paypal_id', $user->paypal_id) }}"
                   class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 shadow">
                💾 Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
