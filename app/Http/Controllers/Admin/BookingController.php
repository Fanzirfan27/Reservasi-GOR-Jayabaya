<?php

// app/Http/Controllers/Admin/BookingController.php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Field;
use App\Models\Booking;
use App\Models\FieldPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Tampilkan semua data booking
    public function indexAdmin()
    {
        $bookings = Booking::with(['user', 'field'])->latest()->get();
        return view('admin.pages.manajemen-reservasi.index', compact('bookings'));
    }
    // Tampilkan semua data booking untuk manajemen reservasi


    // Update status booking
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status booking berhasil diubah.');
    }

    // Hapus booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Booking berhasil dihapus.');
    }

    // Tampilkan jadwal booking berdasarkan jenis dan nama lapangan
    public function getBookingsByField($namaLapangan, $jenis)
{

    return Booking::whereHas('field', function ($query) use ($namaLapangan, $jenis) {
        $query->where('nama_lapangan', $namaLapangan)
              ->where('jenis', $jenis);
    })->orderBy('tanggal')->get();
}


    //userss

public function store(Request $request)
{
    $request->validate([
    'field_id' => 'required|exists:fields,id',
    'tanggal_booking' => 'required|date|after_or_equal:today',
    'waktu_mulai' => 'required|date_format:H:i',
    'durasi' => 'required|integer|min:1',
    'nama_kontak' => 'required|string|max:100',
    'no_hp_kontak' => 'required|string|max:20',
    'alamat_kontak' => 'required|string',
], [
    'field_id.required' => 'Lapangan harus dipilih.',
    'field_id.exists' => 'Lapangan tidak valid.',

    'tanggal_booking.required' => 'Tanggal booking wajib diisi.',
    'tanggal_booking.date' => 'Format tanggal tidak valid.',
    'tanggal_booking.after_or_equal' => 'Tanggal booking tidak boleh sebelum hari ini.',

    'waktu_mulai.required' => 'Waktu mulai wajib diisi.',
    'waktu_mulai.date_format' => 'Format waktu harus HH:MM (contoh: 14:00).',

    'durasi.required' => 'Durasi pemakaian wajib diisi.',
    'durasi.integer' => 'Durasi harus berupa angka.',
    'durasi.min' => 'Durasi minimal adalah 1 jam.',

    'nama_kontak.required' => 'Nama kontak wajib diisi.',
    'nama_kontak.max' => 'Nama kontak maksimal 100 karakter.',

    'no_hp_kontak.required' => 'Nomor HP wajib diisi.',
    'no_hp_kontak.max' => 'Nomor HP maksimal 20 karakter.',

    'alamat_kontak.required' => 'Alamat kontak wajib diisi.',
]);


    $field = Field::findOrFail($request->field_id);
    $waktuMulai = $request->waktu_mulai;
    $durasi = (int)$request->durasi;
    $tanggalBooking = $request->tanggal_booking;

    $bookingDateTime = Carbon::createFromFormat('Y-m-d H:i', $tanggalBooking . ' ' . $waktuMulai);
    if ($bookingDateTime->lt(Carbon::now())) {
        return back()->withErrors(['waktu_mulai' => 'Waktu booking tidak boleh karena sudah lewat.'])->withInput();
    }

    // Hitung jam selesai berdasarkan durasi
    $jamSelesai = Carbon::createFromFormat('H:i', $waktuMulai)->addHours($durasi)->format('H:i');
    $isConflict = Booking::where('field_id', $field->id)
        ->where('tanggal', $tanggalBooking)
        ->where(function ($query) use ($waktuMulai, $jamSelesai) {
            $query->whereBetween('jam_mulai', [$waktuMulai, $jamSelesai])
                  ->orWhereBetween('jam_selesai', [$waktuMulai, $jamSelesai])
                  ->orWhere(function ($query) use ($waktuMulai, $jamSelesai) {
                      $query->where('jam_mulai', '<=', $waktuMulai)
                            ->where('jam_selesai', '>=', $jamSelesai);
                  });
        })
        ->exists();

    if ($isConflict) {
        return back()->withErrors(['message' => 'Jam tersebut sudah dibooking. Silakan pilih waktu lain.'])->withInput();
    }


    $fieldPrice = FieldPrice::where('field_id', $field->id)
        ->whereTime('jam_mulai', '<=', $waktuMulai)
        ->whereTime('jam_selesai', '>', $waktuMulai)
        ->first();

    if (!$fieldPrice) {
        return back()->withErrors(['message' => 'Harga untuk jam tersebut tidak ditemukan.'])->withInput();
    }

    $totalHarga = $fieldPrice->harga * $durasi;

    // Simpan booking
    $booking = new Booking();
    $booking->user_id = Auth::id();
    $booking->field_id = $field->id;
    $booking->tanggal = $tanggalBooking;
    $booking->jam_mulai = $waktuMulai;
    $booking->jam_selesai = $jamSelesai;
    $booking->nama_kontak = $request->nama_kontak;
    $booking->no_hp_kontak = $request->no_hp_kontak;
    $booking->alamat_kontak = $request->alamat_kontak;
    $booking->harga_booking = $totalHarga;
    $booking->status = 'pending';
    $booking->save();

    return redirect()->route('user.dashboard')->with('success', 'Booking berhasil! Menunggu konfirmasi admin.');
}

}
