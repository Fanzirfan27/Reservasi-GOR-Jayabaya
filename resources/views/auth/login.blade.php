<x-guest-layout>
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm">Belum Punya Akun? <a href="{{ route('register') }}" class="text-green-600 font-semibold">Daftar</a></span>
            </div>

            <div class="text-center">
                <div class="flex justify-center items-center my-6">
                    <img src="{{ asset('assets/image/logo_bulat-removebg.png') }}"
                         alt="Logo"
                         class="h-16 w-16 object-contain" />
                </div>
                <h1 class="text-xl font-bold mb-6">Welcome to SPORTJAYA</h1>
            </div>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        placeholder="Masukkan Email Anda"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:outline-none focus:ring focus:border-green-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        placeholder="Masukkan Password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 pr-10 focus:outline-none focus:ring focus:border-green-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-sm" />
                    <!-- Optional eye icon here, just visual -->
                    <div class="absolute right-3 top-10 text-gray-500">
                    </div>
                </div>

                <!-- Remember me & forgot -->
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded-md shadow-md hover:bg-green-700 transition">
                    Selanjutnya
                </button>
            </form>

</x-guest-layout>
