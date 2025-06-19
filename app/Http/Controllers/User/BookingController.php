<?php

namespace App\Http\Controllers\User;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
  public function status($status)
{
    $userId = Auth::id();

    // Validasi status yang diizinkan
    $allowedStatuses = ['all', 'Pending', 'Approved', 'Done', 'Rejected'];
    if (!in_array($status, $allowedStatuses)) {
        abort(404);
    }

    // Ambil semua data jika status "all"
    $query = Booking::with('field')->where('user_id', $userId);
    if ($status !== 'all') {
        $query->where('status', $status);
    }

    $bookings = $query->latest()->get();

    // Untuk AJAX request → kembalikan partial view
    if (request()->ajax()) {
        return view('user.booking.all', compact('bookings'));
    }

    // Kalau bukan AJAX, tolak
    abort(404);
}

public function indexTampilan()
{
    return view('user.booking.index');
}
    public function show(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $payment = $booking->payment;

        return view('user.booking.show', compact('booking', 'payment'));
    }
    public function exportPdf($id)
{
    $booking = Booking::with(['field', 'payment'])->findOrFail($id);

    if ($booking->status !== 'Done') {
        abort(403, 'Export hanya tersedia untuk booking dengan status Done.');
    }

    $pdf = Pdf::loadView('user.pdf.booking', compact('booking'));
    return $pdf->download('bukti-booking-' . $booking->id . '.pdf');
}

}
