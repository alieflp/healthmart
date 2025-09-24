<x-app-layout>
    <div class="py-8 px-6 max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-green-700 mb-6">Daftar Produk</h1>

        {{-- Grid produk --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x200' }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-48 object-cover">

                    <div class="p-4 flex flex-col justify-between h-40">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $product->description }}</p>
                        </div>

                        <div class="flex items-center justify-between mt-3">
                            <span class="text-green-600 font-bold">Rp {{ number_format($product->price,0,',','.') }}</span>
                          <form action="{{ route('cart.store', $product->id) }}" method="POST">
                              @csrf
                              <button type="submit" 
                                  class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition">
                                  🛒 Keranjang
                              </button>
                          </form>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-500">Belum ada produk tersedia.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>