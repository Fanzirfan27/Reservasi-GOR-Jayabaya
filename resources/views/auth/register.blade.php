<x-guest-layout>
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/image/logo_bulat-removebg.png') }}" alt="Logo" class="h-16 w-16 object-contain">
        </div>

        <!-- Title -->
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-1">Daftar akun <span class="text-green-700">SPORTJAYA</span></h2>
        <p class="text-center text-gray-500 mb-6 text-sm">Pastikan Email dan nomer telepon yang anda daftarkan valid.</p>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input id="name" name="name" type="text" required autofocus value="{{ old('name') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-green-600 focus:border-green-600 "placeholder="Masukkan Nama Lengkap">
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Mobile Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Mobile Phone</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">+62</span>
                    <input id="no_telp" name="no_telp" type="text" required value="{{ old('no_telp') }}"
                           class="block w-full rounded-r-md border border-gray-300 py-2 px-3 focus:ring-green-600 focus:border-green-600"
                           placeholder="Masukkan Nomor Telepon">
                </div>
                <x-input-error :messages="$errors->get('no_telp')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-green-600 focus:border-green-600" placeholder="Masukkan Email">
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Kata Sandi -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-green-600 focus:border-green-600" placeholder="Masukkan Kata Sandi">
                <div class="text-sm text-gray-500 mt-1">Minimal 8 karakter, termasuk huruf besar, huruf kecil, dan angka.</div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Ulangi Kata Sandi -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Ulangi Kata Sandi</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                       class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-green-600 focus:border-green-600" placeholder="Ulangi Kata Sandi">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                Lanjut
            </button>

            <!-- Sudah punya akun? -->
            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-green-600 underline">
                    Sudah punya akun? Masuk
                </a>
            </div>
        </form>
</x-guest-layout>
