<x-app-layout>
    <x-slot name="header dashboard">
    </x-slot>
    <section id="home" class="relative w-full h-screen bg-cover bg-center" style="background-image: url('/assets/image/Gor-Jayabaya-Kediri.jpg')">
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-white/0"></div>
        <!-- Isi konten -->
        <div class="relative z-10 max-w-6xl mx-auto px-6 flex flex-col justify-center h-full">
          <div class="w-full md:w-1/2">
            <h1 class="text-4xl md:text-5xl font-bold text-black mb-4 animate-fade-in-down">
              Selamat Datang di <br /> Website Reservasi Lapangan
            </h1>
            <p class="text-lg text-gray-700 mb-6 animate-fade-in-up">Ready for new journy!</p>
              <a href="{{ route('user.bookings.view') }}" class="mt-6 inline-block bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition duration-300 shadow-md animate-bounce">
                Riwayat Reservasi
            </a>
          </div>
        </div>
    </section>
    <section  class="bg-white py-10">
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
    <section id="tentang" class="bg-gray-50 py-12" data-aos="fade-up" data-aos-duration="800">
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

    {{-- cari lapangan terbaik --}}
    <section id="sewa" class="bg-gray-50 py-12" data-aos="fade-up" data-aos-duration="800">
        <div class="max-w-6xl mx-auto px-6">
          <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 border-l-4 border-green-600 pl-4">
            Cari Lapangan <span class="text-green-600">Terbaik?</span> Kami siapkan lapangan terbaik buat kamu!
          </h2>
          <div class="flex flex-row overflow-x-auto snap-x gap-6 py-4">
              <!-- Satu Card -->
              <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col snap-start w-80 md:w-96 hover:scale-105 transition duration-300 min-h-[500px]">
                  <div class="aspect-[16/9] overflow-hidden">
                      <img src="{{ asset('assets/image/Lapangan_voli.jpg') }}" alt="Lapangan Voli" class="w-full h-full object-cover">
                  </div>
                  <div class="p-6 flex-1 flex flex-col">
                      <h2 class="text-lg font-semibold text-center mb-4">LAPANGAN VOLI</h2>
                      <p class="text-gray-600 text-sm flex-1">
                          Lapangan voli di GOR Jayabaya tersedia untuk latihan, turnamen, dan acara komunitas. Permukaan berkualitas dan pencahayaan optimal.
                      </p>
                      <a href="{{ route('penyewaan.voli') }}" class="mt-6 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md text-center">
                          PESAN SEKARANG
                      </a>
                  </div>
              </div>
              <!-- Card Basket -->
              <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col snap-start w-80 md:w-96 hover:scale-105 transition duration-300 min-h-[500px]">
                  <div class="aspect-[16/9] overflow-hidden">
                      <img src="{{ asset('assets/image/Lapangan_basket.png') }}" alt="Lapangan Voli" class="w-full h-full object-cover">
                  </div>
                  <div class="p-6 flex-1 flex flex-col">
                      <h2 class="text-lg font-semibold text-center mb-4">LAPANGAN BASKET</h2>
                      <p class="text-gray-600 text-sm flex-1">
                          Lapangan basket standar FIBA tersedia untuk latihan dan pertandingan. Dilengkapi ring dan permukaan yang aman.
                      </p>
                      <a href="{{ route('penyewaan.basket') }}" class="mt-6 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md text-center">
                          PESAN SEKARANG
                      </a>
                  </div>
              </div>
              <!-- Card Futsal -->
              <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col snap-start w-80 md:w-96 hover:scale-105 transition duration-300 min-h-[500px]">
                  <div class="aspect-[16/9] overflow-hidden">
                      <img src="{{ asset('assets/image/lap_futsal.jpg') }}" alt="Lapangan Voli" class="w-full h-full object-cover">
                  </div>
                  <div class="p-6 flex-1 flex flex-col">
                      <h2 class="text-lg font-semibold text-center mb-4">LAPANGAN FUTSAL</h2>
                      <p class="text-gray-600 text-sm flex-1">
                          Lapangan futsal indoor cocok untuk latihan rutin maupun event komunitas. Permukaan empuk dan pencahayaan merata.
                      </p>
                      <a href="{{ route('penyewaan.futsal') }}" class="mt-6 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md text-center">
                          PESAN SEKARANG
                      </a>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <section id="kontak">
      <footer class="bg-white border-t mt-10">
        <div class="max-w-7xl mx-auto px-4 py-10 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Maps -->
                <div data-aos="fade-right" data-aos-duration="800" class="w-full h-64 rounded-lg overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.5604424948276!2d112.0149974746423!3d-7.621953975812337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786fe9d78584c3%3A0x69ca98c4c928242c!2sGOR%20Jayabaya!5e0!3m2!1sid!2sid!4v1714898389242!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Kontak -->
                <div class="text-center md:text-left space-y-2">
                    <h4 data-aos="fade-left" data-aos-duration="800" class="text-gray-800 font-semibold text-lg">JAYASPORT</h4>
                    <p data-aos="fade-left" data-aos-duration="800" class="text-gray-600 text-sm">Contact Number: +62 859 7410 1379</p>
                    <p data-aos="fade-left" data-aos-duration="800" class="text-gray-600 text-sm leading-relaxed">
                        Jl. Jayabaya, Banjarmlati, Kec. Mojoroto,<br>
                        Kabupaten Kediri, Jawa Timur 16456 64112
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-500 text-sm mt-6">
                &copy; {{ date('Y') }} Jayasport. All rights reserved.
        </div>
      </footer>
    </section>
</x-app-layout>
