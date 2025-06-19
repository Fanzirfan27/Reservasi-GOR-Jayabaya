<div class="overflow-x-auto bg-white rounded-xl shadow-md">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-blue-100">
      <tr>
          <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Nama Lapangan</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Tanggal Booking</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Jam Mulai & Selesai</th>
          <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase tracking-wider">Status</th>
          <th class="relative px-6 py-3">
                <span class="sr-only">Detail</span>
            </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($bookings as $booking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $booking->field->nama_lapangan }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $booking->tanggal }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $booking->status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('user.bookings.show', $booking->id) }}" class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
                            </td>
                        </tr>
                        @endforeach
      </tbody>
    </table>
  </div>
