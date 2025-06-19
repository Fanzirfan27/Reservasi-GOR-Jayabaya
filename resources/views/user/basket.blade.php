<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Sewa Lapangan Basket</h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($fields as $field)
                <div class="p-4">
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 ring-1 ring-gray-200">
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ asset('uploads/lapangan/' . $field->foto) }}"
                                 alt="{{ $field->nama_lapangan }}"
                                 class="w-full h-full object-cover transition duration-300 hover:scale-105">
                        </div>

                        <div class="p-6 space-y-3">
                            <h4 class="text-xl font-bold text-gray-800">{{ $field->nama_lapangan }}</h4>
                            <p class="text-gray-600">{{ $field->deskripsi }}</p>
                            <p class="text-gray-500 text-sm">{{ $field->lokasi }}</p>
                            <p class="text-gray-600 mb-2 font-semibold">Harga:</p>
                            <ul class="text-sm text-gray-700">
                                @foreach($field->prices as $price)
                                    <li>{{ $price->jam_mulai }} - {{ $price->jam_selesai }}: 
                                        <span class="font-medium text-green-600">Rp {{ number_format($price->harga) }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="rounded overflow-hidden border mt-4">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.5604424948276!2d112.0149974746423!3d-7.621953975812337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786fe9d78584c3%3A0x69ca98c4c928242c!2sGOR%20Jayabaya!5e0!3m2!1sid!2sid!4v1714898389242!5m2!1sid!2sid"
                                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>

                            @php
                                $bookings = $bookingsByField[$field->id] ?? collect();
                            @endphp

                            <div class="mt-4">
                                <h5 class="font-semibold mb-2 text-gray-700">Jadwal yang sudah di Booking</h5>
                                @if($bookings->isNotEmpty())
                                    <ul class="text-sm text-gray-700 border border-green-500 rounded p-3">
                                        @foreach($bookings as $booking)
                                            <li>{{ $booking->tanggal }} - {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-gray-600 text-sm">Belum ada jadwal yang di booking.</p>
                                @endif
                            </div>

                            <div class="mt-6">
                                <a href="{{ url('/penyewaan/' . $field->id) }}"
                                   class="inline-block bg-green-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-green-700 transition duration-300 shadow">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @if ($fields->isEmpty())
                    <p class="text-gray-600">Belum ada lapangan basket tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
