@extends('admin.layout')

@section('content')
<div class="bg-white shadow rounded-2xl p-6">
    <!-- Judul -->
    <h1 class="text-2xl font-bold text-green-700 mb-6">✍️ Guestbook</h1>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            ✅ {{ session('success') }}
        </div>
    @endif

    <!-- Tabel -->
    <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left">ID</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">Email</th>
                <th class="px-4 py-3 text-left">Pesan</th>
                <th class="px-4 py-3 text-left">Tanggal</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($guestbooks as $guest)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-3 text-sm text-gray-600">{{ $guest->id }}</td>
                    <td class="px-4 py-3 font-semibold text-gray-800">{{ $guest->name }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $guest->email }}</td>
                    <td class="px-4 py-3 text-gray-700 max-w-xs truncate">{{ $guest->message }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $guest->created_at->format('d M Y H:i') }}</td>
                    <td class="px-4 py-3 text-center">
                        <form action="{{ route('admin.guestbook.destroy', $guest->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Yakin hapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded shadow">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-3 text-center text-gray-500">
                        Belum ada pesan tamu
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $guestbooks->links('pagination::tailwind') }}
    </div>
</div>
@endsection
