@if ($bookings->isEmpty())
    <div class="p-6 text-center text-gray-500">
        Tidak ada data reservasi.
    </div>
@else
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
                {{ optional($booking->field)->nama_lapangan ?? '-' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ \Carbon\Carbon::parse($booking->tanggal)->format('d-m-Y') }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap capitalize">
                <span class="inline-block px-2 py-1 text-xs font-semibold rounded 
                    @switch($booking->status)
                        @case('Pending') bg-yellow-100 text-yellow-800 @break
                        @case('Approved') bg-green-100 text-green-800 @break
                        @case('Rejected') bg-red-100 text-red-800 @break
                        @case('Done') bg-gray-100 text-gray-800 @break
                        @default bg-gray-100 text-gray-600
                    @endswitch
                ">
                    {{ $booking->status }}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('user.bookings.show', $booking->id) }}" class="text-blue-600 hover:text-blue-900">Lihat Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endif
