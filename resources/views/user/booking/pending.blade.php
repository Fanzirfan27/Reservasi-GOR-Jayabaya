<div class="overflow-x-auto bg-white rounded-xl shadow-md">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-blue-100">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Nama Lapangan</th>
        <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Tanggal Booking</th>
        <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Jam Mulai & Selesai</th>
        <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Status</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-100">
      @foreach($bookings as $booking)
        <tr class="hover:bg-blue-50 transition duration-150">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-medium">
            {{ $booking->field->nama_lapangan }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
            {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
            {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm">
            <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 font-semibold">
              {{ $booking->status }}
            </span>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
