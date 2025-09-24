<x-guest-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-teal-50 via-white to-amber-50">
        <!-- Left side illustration -->
        <div class="hidden lg:flex w-1/2 items-center justify-center bg-gradient-to-br from-green-100 to-blue-100">
            <img src="https://img.freepik.com/free-vector/online-doctor-concept-illustration_114360-1472.jpg" 
                alt="Login Illustration" class="w-3/4 rounded-2xl shadow-xl">
        </div>
        <!-- Right side form -->
        <div class="flex flex-col justify-center w-full lg:w-1/2 px-8 lg:px-20">
            <div class="w-full max-w-lg mx-auto">
                <!-- Tombol kembali -->
                <a href="{{ url('/') }}" 
                class="inline-flex items-center text-sm text-green-600 hover:text-green-800 mb-6">
                    ⬅ Kembali ke Home
                </a>

                <h1 class="text-4xl font-extrabold text-green-700 mb-2">HealthMart</h1>
                <p class="text-gray-600 mb-8">Masuk untuk melanjutkan belanja alat kesehatan dan obat Anda</p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        <a href="#" class="text-sm text-green-600 hover:text-green-800">Lupa password?</a>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition">
                        Masuk
                    </button>
                </form>

                <!-- Link -->
                <p class="mt-6 text-center text-sm text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-green-600 hover:text-green-800 font-semibold">Daftar</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
