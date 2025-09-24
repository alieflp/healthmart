<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-700 text-white min-h-screen flex flex-col justify-between p-6">
            <div>
                <h1 class="text-2xl font-bold mb-6">Admin Panel</h1>
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-green-600">📊 Dashboard</a>
                    <a href="{{ route('admin.products.index') }}" class="block px-3 py-2 rounded hover:bg-green-600">📦 Products</a>
                    <a href="{{ route('admin.categories.index') }}" class="block px-3 py-2 rounded hover:bg-green-600">📂 Categories</a>
                    <a href="{{ route('admin.orders.index') }}" class="block px-3 py-2 rounded hover:bg-green-600">🛒 Orders</a>
                    <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded hover:bg-green-600">👤 Users</a>
                    <a href="{{ route('admin.shops.index') }}" class="block px-3 py-2 rounded hover:bg-green-600">🏬 Shop</a>
                    <a href="{{ route('admin.guestbook.index') }}" class="block px-3 py-2 rounded hover:bg-green-600">✍️ Guestbook</a>
                </nav>
            </div>

            <!-- Logout -->
            <div class="mt-6 border-t border-green-600 pt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" 
                        class="w-full text-left px-3 py-2 rounded bg-red-600 hover:bg-red-700 text-white font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
