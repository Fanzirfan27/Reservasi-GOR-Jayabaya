<nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/image/logo_sportjaya.png') }}"
            alt="Logo"
            class="h-8 w-8 object-contain" />
            <span class="text-xl font-bold">Reservasi GOR</span>
        </div>
        <ul class="hidden md:flex space-x-6 items-center">
            <li><a href="{{ route('user.dashboard') }}#home" class="text-gray-800 hover:text-green-600 font-medium">Home</a></li>
            <li><a href="{{ route('user.dashboard') }}#tentang" class="text-gray-800 hover:text-green-600 font-medium">About Us</a></li>
            <li><a href="{{ route('user.dashboard') }}#sewa" class="text-gray-800 hover:text-green-600 font-medium">Sewa Lapangan</a></li>
            <li><a href="{{ route('user.dashboard') }}#kontak" class="text-gray-800 hover:text-green-600 font-medium">Contact Us</a></li>
            @auth
                <div class="relative">
                    <button id="userDropdown" class="flex items-center text-gray-800 hover:text-green-600 font-medium">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="dropdownMenu" class="absolute right-0 mt-2 w-40 bg-white rounded shadow-md hidden">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </ul>
        <div class="md:hidden">
            <button>
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>
</nav>
