<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthMart - Customer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans">

    <!-- Navbar Customer -->
    <nav class="backdrop-blur-md bg-white/80 shadow-md fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">
            <div class="text-2xl font-extrabold text-green-600 tracking-wide">💊 HealthMart</div>
            <ul class="flex space-x-6 font-medium">
                <li><a href="{{ route('customer.home') }}" class="text-gray-700 hover:text-green-600 transition">Home</a></li>
                <li><a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-green-600 transition">Cart</a></li>
                <li><a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-green-600 transition">Orders</a></li>
                <li><a href="{{ route('shops.index') }}" class="text-gray-700 hover:text-green-600 transition">Shops</a></li>
                <li><a href="{{ route('profile.index') }}" class="text-gray-700 hover:text-green-600 transition">Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-green-600 transition">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-20">
        @yield('content')
    </main>
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
