<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Detail Booking</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6 space-y-6">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Informasi Lapangan</h3>
                <div class="space-y-2 text-gray-700">
                    <p><span class="font-medium">Nama Lapangan:</span> {{ $booking->field->nama_lapangan }}</p>
                    <p><span class="font-medium">Jenis Lapangan:</span> {{ $booking->field->jenis }}</p>
                    <p><span class="font-medium">Jam Main:</span> {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</p>
                    <p><span class="font-medium">Harga Booking:</span> Rp {{ number_format($booking->harga_booking) }}</p>
                    <p><span class="font-medium">Status:</span> 
                        <span class="px-2 py-1 text-sm rounded {{ $booking->status == 'Done' ? 'bg-green-200 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $booking->status }}
                        </span>
                    </p>
                </div>

                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">Informasi Pembayaran</h3>
                <div class="space-y-2 text-gray-700">
                    @if ($booking->status == 'Approved' && !$booking->payment)
                        {{-- Informasi Transfer --}}
                        <div class="bg-gray-100 p-4 rounded shadow">
                            <h3 class="font-semibold text-lg mb-2">Silakan transfer ke salah satu rekening berikut:</h3>
                            <ul class="list-disc list-inside space-y-1">
                                <li><span class="font-medium">Bank BCA:</span> 1234567890 a.n. Nama Pemilik </li>
                                <li><span class="font-medium">Bank Mandiri:</span> 0987654321 a.n. Nama Pemilik</li>
                                <li><span class="font-medium">DANA:</span> 081259235969 a.n. Irfan</li>
                            </ul>
                        </div>
                        <form action="{{ route('user.payments.store', $booking->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="bukti_struk" class="block font-medium">Upload Bukti Transfer:</label>
                                <input type="file" name="bukti_struk" id="bukti_struk" class="mt-1 block w-full border rounded px-3 py-2">
                            </div>
                            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                Upload
                            </button>
                        </form>
                    @elseif($booking->payment)
                        <p><span class="font-medium">Status Pembayaran:</span> {{ $booking->payment->status }}</p>
                        <a href="{{ asset('storage/' . $booking->payment->bukti_struk) }}" target="_blank" class="text-blue-600 underline">
                            Lihat Bukti Transfer
                        </a>
                    @else
                        <p>Belum ada pembayaran yang terdata.</p>
                    @endif
                </div>

                @if($booking->status == 'Done')
                    <div class="pt-4 border-t mt-6">
                        <a href="{{ route('booking.export.pdf', $booking->id) }}" 
                           class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            Cetak Bukti Booking (PDF)
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
