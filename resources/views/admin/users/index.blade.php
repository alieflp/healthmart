@extends('admin.layout')

@section('content')
<div class="bg-white shadow rounded-2xl p-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">👥 Daftar Users</h1>

    <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Role</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $user->id }}</td>
                    <td class="px-4 py-3 font-semibold">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full text-sm font-medium 
                            {{ $user->role == 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 flex gap-2 justify-center">
                        <a href="#" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded shadow">Detail</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded shadow">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
