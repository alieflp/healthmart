@extends('customer.layout')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12 h-[calc(100vh-5rem)]">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 h-full">
        
        <!-- Sidebar Categories -->
        <aside class="md:col-span-1 bg-gradient-to-br from-teal-50 to-amber-50 shadow-lg rounded-2xl p-6 h-fit">
            <h2 class="text-xl font-extrabold text-green-700 mb-6 border-b pb-2">Kategori</h2>
            <ul class="space-y-3">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category->id) }}" 
                        class="flex items-center gap-3 px-4 py-3 rounded-lg bg-white shadow hover:shadow-md hover:bg-teal-100 transition">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- Products -->
        <div class="md:col-span-3 bg-transparent h-full overflow-y-auto pr-2 products-scroll">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">✨ Produk Terbaru</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pb-10">
                @forelse ($products as $product)
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2 hover:scale-[1.02] p-5 flex flex-col relative overflow-hidden">
                        
                        <!-- Badge kategori -->
                        <span class="absolute top-3 left-3 bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            {{ $product->category->name ?? 'Umum' }}
                        </span>

                        <!-- Gambar -->
                        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/200' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-52 object-cover rounded-xl mb-4">

                        <!-- Detail -->
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                            <p class="text-green-600 font-extrabold text-lg">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-5 flex space-x-3">
                            <a href="{{ route('customer.products.show', $product->id) }}" 
                               class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium shadow-sm transition">
                                👁️ View
                            </a>
                            <form action="{{ route('cart.store', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                    class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition">
                                    🛒 Buy
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-gray-500 italic">Belum ada produk tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
