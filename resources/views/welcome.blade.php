<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMart</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <nav class="backdrop-blur-md bg-white/80 shadow-md fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">
            <div class="text-2xl font-extrabold text-green-600 tracking-wide">💊 HealthMart</div>
            <ul class="flex space-x-6 font-medium">
                <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 transition">Home</a></li>
                <li><a href="#contact" class="text-gray-700 hover:text-green-600 transition">Contact</a></li>
                <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 transition">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-[500px]" style="background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3');">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40 flex items-center justify-center">
            <div class="text-center text-white px-6">
                <h1 class="text-5xl font-extrabold drop-shadow-lg">Selamat Datang di <span class="text-green-400">HealthMart</span></h1>
                <p class="mt-4 text-lg text-gray-200">Marketplace alat kesehatan dan obat terpercaya dengan pilihan lengkap & pengiriman cepat.</p>
                <a href="#shop" class="mt-6 inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-full font-semibold shadow-lg transition">
                    🚀 Lihat Produk
                </a>
            </div>
        </div>
    </section>

    <!-- Shop Section -->
    <section id="shop" class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            
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
            <div class="md:col-span-3">
                <h2 class="text-3xl font-bold mb-8 text-gray-800">✨ Produk Terbaru</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
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
                                <p class="text-green-600 font-extrabold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>

                            <!-- Action Button hanya untuk guest -->
                            <div class="mt-5">
                                <a href="{{ route('login') }}" 
                                   class="block text-center bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold shadow-md transition">
                                    🔑 Login to Buy
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Guestbook Section -->
    <section class="bg-gradient-to-br from-teal-50 to-amber-50 py-20">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            <!-- Left: Guestbook Form -->
            <div class="bg-white shadow-lg p-8 rounded-2xl border-t-4 border-green-500">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">💬 Pesan & Kesan</h2>
                
                <form action="{{ route('guestbook.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" required 
                               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea name="message" id="message" rows="4" required 
                                  class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right: Illustration -->
            <div class="flex justify-center">
                <img src="https://img.freepik.com/free-vector/medical-team-concept-illustration_114360-1869.jpg" 
                     alt="Health Illustration" 
                     class="rounded-2xl shadow-lg max-h-[400px] object-contain">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-white py-12 mt-12 border-t-4 border-green-500">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-gray-600">
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">HealthMart</h3>
                <p>Marketplace alat kesehatan dan obat terpercaya dengan layanan cepat & aman.</p>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Hubungi Kami</h3>
                <ul class="space-y-2">
                    <li>📍 Jl. Kesehatan No. 123, Jakarta</li>
                    <li>📞 +62 812-3456-7890</li>
                    <li>📧 support@healthmart.com</li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Ikuti Kami</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-green-600 hover:text-green-800">🌐 Facebook</a>
                    <a href="#" class="text-green-600 hover:text-green-800">📸 Instagram</a>
                    <a href="#" class="text-green-600 hover:text-green-800">🐦 Twitter</a>
                </div>
            </div>
        </div>
        <div class="mt-8 pt-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} HealthMart. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
