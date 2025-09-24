@extends('customer.layout')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-extrabold text-gray-800 mb-6">📊 Status Pengajuan Toko</h1>

    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 text-sm uppercase">
                    <th class="px-6 py-3">Nama Toko</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-center">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($shops as $shop)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $shop->shop_name }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($shop->status == 'pending')
                                <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">Pending</span>
                            @elseif($shop->status == 'approved')
                                <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">Disetujui</span>
                            @else
                                <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">Ditolak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center text-gray-500 text-sm">
                            {{ $shop->created_at->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                            Belum ada pengajuan toko.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
