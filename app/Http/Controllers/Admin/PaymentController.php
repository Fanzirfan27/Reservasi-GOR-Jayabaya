<?php
// app/Http/Controllers/Admin/PaymentController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking.user')->latest()->get();
        return view('admin.pages.manajemen-pembayaran.index', compact('payments'));
    }
    public function update(Request $request, Payment $payment)
{
    $request->validate([
        'status' => 'required|in:done,rejected', 
    ]);

    $payment->update([
        'status' => $request->status,
    ]);

    // Update juga status booking jika status pembayaran adalah 'done' atau 'rejected'
    if (in_array($request->status, ['done', 'rejected'])) {
        $payment->booking->update([
            'status' => $request->status,
        ]);
    }

    return redirect()->back()->with('success', 'Status pembayaran & booking berhasil diperbarui.');
}
}
