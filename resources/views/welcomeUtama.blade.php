<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Lapangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        /* Animasi tambahan */
        @keyframes fade-in-down {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down {
            animation: fade-in-down 1s ease-out;
        }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans scroll-smooth">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
          <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/image/logo_sportjaya.png') }}"
            alt="Logo"
            class="h-8 w-8 object-contain" />
              <span class="text-xl font-bold">Reservasi GOR</span>
          </div>
          <div class="hidden md:flex space-x-6 items-center">
              @if (Route::has('login'))
                  @auth
                      <a href="{{ url('/dashboard') }}" class="text-gray-800 hover:text-green-600 font-medium">Dashboard</a>
                  @else
                      <a href="{{ route('login') }}" class="text-gray-800 hover:text-green-600 font-medium">Masuk</a>
                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Daftar Akun</a>
                      @endif
                  @endauth
              @endif
          </div>
          <!-- Hamburger menu mobile -->
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
  
  <!-- Hero Section -->
  <section class="relative w-full h-screen bg-cover bg-center" style="background-image: url('/assets/image/Gor-Jayabaya-Kediri.jpg')">
    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-white/0"></div>
    <!-- Isi konten -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 flex flex-col justify-center h-full">
      <div class="w-full md:w-1/2">
        <h1 class="text-4xl md:text-5xl font-bold text-black mb-4 animate-fade-in-down">
          Selamat Datang di <br /> Website Reservasi Lapangan
        </h1>
        <p class="text-lg text-gray-700 mb-6 animate-fade-in-up">Ready for new journy!</p>
        <a href="#sewa" class="mt-6 inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition duration-300 shadow-md animate-bounce">
            Pesan Sekarang
        </a>
      </div>
    </div>
  </section>
    <!-- Fitur Section -->

<section id="sewa" class="bg-white py-10">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
      <div class="hover:scale-105 transition transform duration-300 p-4 shadow rounded-lg">
        <div class="text-red-600 text-4xl mb-4 flex justify-center">
          <i data-lucide="calendar-clock" class="w-10 h-10"></i>
        </div>
        <h3 class="font-semibold text-lg">Buka Setiap Hari</h3>
        <p class="text-sm text-gray-600">Jam operasional dari 08:00 - 00:00</p>
      </div>
      <div class="hover:scale-105 transition transform duration-300 p-4 shadow rounded-lg">
        <div class="text-red-600 text-4xl mb-4 flex justify-center">
          <i data-lucide="headset" class="w-10 h-10"></i>
        </div>
        <h3 class="font-semibold text-lg">Pelayanan 24/7</h3>
        <p class="text-sm text-gray-600">Jasa pemesanan online 24 jam</p>
      </div>
      <div class="hover:scale-105 transition transform duration-300 p-4 shadow rounded-lg">
        <div class="text-red-600 text-4xl mb-4 flex justify-center">
          <i data-lucide="wifi" class="w-10 h-10"></i>
        </div>
        <h3 class="font-semibold text-lg">Free Wifi</h3>
        <p class="text-sm text-gray-600">Tersedia Wifi di setiap spot</p>
      </div>
    </div>
  </section>
  
  <!-- Tentang Website Kami -->
<section class="bg-gray-50 py-12" data-aos="fade-up" data-aos-duration="800">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 border-l-4 border-green-600 pl-4">
        Tentang Website Kami
      </h2>
      <p class="text-gray-700 leading-relaxed">
        Selamat datang di sistem pembookingan GOR Jayabaya! Website ini dirancang untuk mempermudah proses pemesanan lapangan secara online dengan cepat dan efisien. 
        Melalui platform ini, Anda dapat melihat jadwal ketersediaan lapangan secara real-time, melakukan pemesanan dengan mudah, serta menerima notifikasi otomatis terkait status pemesanan Anda.
        Sistem ini juga membantu pengelola GOR dalam mengatur data pemakaian lapangan secara lebih sistematis dan transparan. 
        Saat ini, pembayaran masih dilakukan secara offline setelah pemesanan dikonfirmasi oleh admin. 
        Nikmati kemudahan dalam membooking lapangan GOR Jayabaya tanpa harus datang langsung ke lokasi!
      </p>
    </div>
  </section>
  
  <!-- Bagaimana Memulai Reservasi Lapangan -->
  <section class="bg-white py-12" data-aos="fade-up" data-aos-duration="800">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
      <!-- Gambar -->
      <div data-aos="fade-right" data-aos-duration="800">
        <img src="/assets/image/gambar1.jpg" alt="GOR Jayabaya" class="rounded-lg shadow-md w-full">
      </div>
      <!-- Langkah-langkah -->
      <div>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 border-l-4 border-green-600 pl-4" data-aos="fade-left" data-aos-duration="800">
          Bagaimana Memulai Reservasi Lapangan?
        </h2>
        <ul class="space-y-4">
          <li class="flex items-start" data-aos="fade-left" data-aos-duration="800">
            <i data-lucide="user-plus" class="w-6 h-6 text-green-600 mr-3 mt-1"></i>
            <span>Registrasi Akun</span>
          </li>
          <li class="flex items-start" data-aos="fade-left" data-aos-duration="800">
            <i data-lucide="map-pin" class="w-6 h-6 text-green-600 mr-3 mt-1"></i>
            <span>Pilih Lapangan yang sesuai dan tersedia</span>
          </li>
          <li class="flex items-start" data-aos="fade-left" data-aos-duration="800">
            <i data-lucide="calendar-plus" class="w-6 h-6 text-green-600 mr-3 mt-1"></i>
            <span>Lakukan booking lapangan</span>
          </li>
          <li class="flex items-start"data-aos="fade-left" data-aos-duration="800">
            <i data-lucide="clock" class="w-6 h-6 text-green-600 mr-3 mt-1"></i>
            <span>Silakan Tunggu Konfirmasi dari Admin</span>
          </li>
          <li class="flex items-start" data-aos="fade-left" data-aos-duration="800">
            <i data-lucide="wallet" class="w-6 h-6 text-green-600 mr-3 mt-1"></i>
            <span>Melakukan Pembayaran Offline</span>
          </li>
          <li class="flex items-start" data-aos="fade-left" data-aos-duration="800">
            <i data-lucide="check-circle" class="w-6 h-6 text-green-600 mr-3 mt-1"></i>
            <span>Selesai</span>
          </li>
        </ul>
      </div>
    </div>
  </section>
  
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>
</body>
<script>
    lucide.createIcons();
  </script>
</html>
