<x-guest-layout>
    <!-- Left side illustration -->
    <div class="hidden lg:flex w-1/2 sticky top-0 h-screen 
                bg-gradient-to-br from-green-100 to-blue-100 
                items-center justify-center">
        <img src="https://img.freepik.com/free-vector/medical-team-concept-illustration_114360-1869.jpg"
             alt="Register Illustration" class="w-3/4 rounded-xl shadow-lg">
    </div>

    <!-- Right side form -->
    <div class="flex flex-col justify-center w-full lg:w-1/2 px-6 lg:px-16 bg-white">
        <div class="w-full max-w-2xl mx-auto p-8">

            <!-- Tombol kembali -->
            <a href="{{ url('/') }}" 
               class="inline-flex items-center text-sm text-green-600 hover:text-green-800 mb-6">
                ⬅ Kembali ke Home
            </a>

            <h1 class="text-4xl font-extrabold text-green-700 mb-2 text-left">Buat Akun HealthMart</h1>
            <p class="text-gray-500 mb-8 text-left">Daftar sekarang untuk mulai belanja alat kesehatan dan obat</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Grid 2 kolom -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Ulangi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <!-- Date of Birth & Gender -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select id="gender" name="gender"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                            <option value="">Pilih</option>
                            <option value="male" {{ old('gender')=='male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender')=='female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input id="address" type="text" name="address" value="{{ old('address') }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- City & Contact -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Kota</label>
                        <input id="city" type="text" name="city" value="{{ old('city') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>

                    <div>
                        <label for="contact_no" class="block text-sm font-medium text-gray-700">Nomor Kontak</label>
                        <input id="contact_no" type="text" name="contact_no" value="{{ old('contact_no') }}"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                        <x-input-error :messages="$errors->get('contact_no')" class="mt-2" />
                    </div>
                </div>

                <!-- Paypal -->
                <div>
                    <label for="paypal_id" class="block text-sm font-medium text-gray-700">PayPal ID</label>
                    <input id="paypal_id" type="text" name="paypal_id" value="{{ old('paypal_id') }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    <x-input-error :messages="$errors->get('paypal_id')" class="mt-2" />
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-green-600 text-white py-3 rounded-lg shadow hover:bg-green-700 transition text-lg font-semibold">
                    Daftar
                </button>
            </form>

            <!-- Link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-green-600 hover:text-green-800 font-semibold">Masuk</a>
            </p>
        </div>
    </div>
</x-guest-layout>
