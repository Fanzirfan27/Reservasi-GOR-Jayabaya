<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Booking Lapangan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">{{ $field->nama_lapangan }}</h3>
                    <p class="text-gray-600 mb-4">Jenis: {{ $field->jenis }}</p>
                    <img src="{{ asset('uploads/lapangan/' . $field->foto) }}" alt="{{ $field->nama_lapangan }}" class="w-full h-48 object-cover mb-4">

                    @if($fieldPrices->isNotEmpty())
                        <p class="text-gray-600 mb-4">Harga:</p>
                        <ul>
                            @foreach($fieldPrices as $price)
                                <li>{{ $price->jam_mulai }} - {{ $price->jam_selesai }}: Rp{{ number_format($price->harga) }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600 mb-4">Harga belum tersedia.</p>
                    @endif

                    <form id ="BookingForm" method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <input type="hidden" name="field_id" value="{{ $field->id }}">
                        @if ($errors->any())
                            <div class="alert alert-danger bg-red-100 text-red-600 p-4 mb-4 rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label for="tanggal_booking" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Booking:</label>
                            <input type="date" name="tanggal_booking" id="tanggal_booking" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('tanggal_booking')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="waktu_mulai" class="block text-gray-700 text-sm font-bold mb-2">Waktu Mulai:</label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('waktu_mulai')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="durasi" class="block text-gray-700 text-sm font-bold mb-2">Durasi (Jam):</label>
                            <input type="number" name="durasi" id="durasi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="1">
                        </div>

                        <div class="mb-4">
                        @php
                            $user = Auth::user();
                        @endphp

                        <div class="mb-4">
                            <label for="nama_kontak" class="block text-gray-700 text-sm font-bold mb-2">Nama Kontak:</label>
                            <input type="text" name="nama_kontak" id="nama_kontak" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->name }}">
                            @error('nama_kontak')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="no_hp_kontak" class="block text-gray-700 text-sm font-bold mb-2">No. HP Kontak:</label>
                            <input type="text" name="no_hp_kontak" id="no_hp_kontak" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->no_telp }}">
                            @error('no_hp_kontak')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="alamat_kontak" class="block text-gray-700 text-sm font-bold mb-2">Alamat Kontak:</label>
                            <textarea name="alamat_kontak" id="alamat_kontak" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $user->alamat }}</textarea>
                            @error('alamat_kontak')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="button" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="showConfirmationModal()">
                            Booking Sekarang
                        </button>
                    </form>
                    <div id="confirmationModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
                        <div id="modalContent" class="bg-white rounded-2xl shadow-2xl w-[90%] max-w-xl px-8 py-6 animate-slideUp transform transition-all duration-300 translate-y-full opacity-0">
                            <!-- JUDUL -->
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 text-center">Konfirmasi Booking</h2>

                            <!-- DETAIL INFORMASI -->
                            <div class="ml-3 mr-3 space-y-1 text-base text-gray-700 leading-relaxed">
                                <p><strong>Lapangan:</strong> {{ $field->nama_lapangan }}</p>
                                <p><strong>Tanggal:</strong> <span id="modalTanggal"></span></p>
                                <p><strong>Waktu:</strong> <span id="modalWaktuMulai"></span></p>
                                <p><strong>Durasi:</strong> <span id="modalDurasi"></span> jam</p>
                                <p><strong>Harga Total:</strong> Rp <span id="modalTotalHarga"></span></p>
                                <p><strong>Kontak:</strong> <span id="modalNamaKontak"></span></p>
                                <p><strong>No HP:</strong> <span id="modalNoHpKontak"></span></p>
                            </div>

                            <!-- TOMBOL -->
                            <div class="flex justify-center gap-4 pt-8">
                                <button onclick="closeModal()" class="px-6 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                                    Batal
                                </button>
                                <button onclick="submitForm()" class="px-6 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700">
                                    Konfirmasi
                                </button>
                            </div>
                        </div>
                    </div>
                    <style>
                        @keyframes slideUp {
                            from {
                                transform: translateY(100px);
                                opacity: 0;
                            }
                            to {
                                transform: translateY(0);
                                opacity: 1;
                            }
                        }   
                            .animate-slideUp {
                                animation: slideUp 0.3s ease-out forwards;
                            }
                        </style>
                    <script>
function showConfirmationModal() {
    const modal = document.getElementById('confirmationModal');
    const content = document.getElementById('modalContent');

    // Set data ke modal
    document.getElementById('modalTanggal').innerText = document.getElementById('tanggal_booking').value;
    document.getElementById('modalWaktuMulai').innerText = document.getElementById('waktu_mulai').value;
    document.getElementById('modalDurasi').innerText = document.getElementById('durasi').value;
    document.getElementById('modalNamaKontak').innerText = document.getElementById('nama_kontak').value;
    document.getElementById('modalNoHpKontak').innerText = document.getElementById('no_hp_kontak').value;

    // Hitung total harga
    var durasi = parseInt(document.getElementById('durasi').value);
    var waktuMulai = document.getElementById('waktu_mulai').value;
    var fieldPrices = @json($fieldPrices);
    var hargaPerJam = 0;

    for (var i = 0; i < fieldPrices.length; i++) {
        if (waktuMulai >= fieldPrices[i].jam_mulai && waktuMulai < fieldPrices[i].jam_selesai) {
            hargaPerJam = fieldPrices[i].harga;
            break;
        }
    }

    var totalHarga = hargaPerJam * durasi;
    document.getElementById('modalTotalHarga').innerText = totalHarga.toLocaleString('id-ID');

    // Tampilkan modal dengan animasi
    modal.classList.remove('hidden');
    setTimeout(() => {
        content.classList.remove('translate-y-full', 'opacity-0');
        content.classList.add('translate-y-0', 'opacity-100');
    }, 50);
}

function closeModal() {
    const modal = document.getElementById('confirmationModal');
    const content = document.getElementById('modalContent');

    content.classList.remove('translate-y-0', 'opacity-100');
    content.classList.add('translate-y-full', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

function submitForm() {
    document.getElementById('BookingForm').submit();
}

                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>