<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'bukti_struk' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $path = $request->file('bukti_struk')->store('bukti_struk', 'public');


        Payment::create([
            'booking_id' => $booking->id,
            'bukti_struk' => $path,
            'jumlah' => $booking->harga_booking,
            'status' => 'pending',
        ]);

        return redirect()->route('user.bookings.show', $booking->id)
            ->with('success', 'Bukti transfer berhasil diupload! Menunggu verifikasi admin.');
    }
}
