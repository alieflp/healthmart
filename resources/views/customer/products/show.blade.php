@extends('customer.layout')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white shadow-lg rounded-2xl p-8">
        
        <!-- Gambar Produk -->
        <div>
            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/400' }}" 
                 alt="{{ $product->name }}" 
                 class="w-full max-h-[400px] object-cover rounded-xl shadow-md">
        </div>

        <!-- Detail Produk -->
        <div class="flex flex-col justify-between">
            <div>
                <!-- Nama & Kategori -->
                <h1 class="text-3xl font-extrabold text-gray-800">{{ $product->name }}</h1>
                <p class="mt-2 text-sm text-gray-500">
                    Kategori: 
                    <span class="font-semibold text-green-700">
                        {{ optional($product->category)->name ?? 'Umum' }}
                    </span>
                </p>

                <!-- Harga -->
                <p class="text-2xl text-green-600 font-bold mt-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <!-- Deskripsi -->
                <p class="mt-6 text-gray-700 leading-relaxed">
                    {{ $product->description ?? 'Tidak ada deskripsi tersedia.' }}
                </p>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('products.index') }}" 
                   class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-3 rounded-lg font-medium shadow-sm transition">
                    ⬅️ Kembali
                </a>
                <form action="{{ route('cart.store', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" 
                        class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition">
                        🛒 Tambah ke Keranjang
                    </button>
                </form>
                </form>
            </div>
        </div>
    </div>

    <!-- Feedback Produk -->
    <div class="mt-12 bg-white rounded-2xl shadow p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">⭐ Ulasan Customer</h2>
        @forelse ($product->feedbacks as $feedback)
            <div class="mb-6 border-b pb-4">
                <div class="flex items-center gap-3 mb-2">
                    <span class="font-semibold text-green-700">
                        {{ $feedback->user->username ?? 'Anonim' }}
                    </span>
                    <div class="text-yellow-500">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $feedback->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>
                </div>
                <p class="text-gray-600">{{ $feedback->comment }}</p>
            </div>
        @empty
            <p class="text-gray-500 italic">Belum ada ulasan untuk produk ini.</p>
        @endforelse
    </div>
</div>
@endsection
