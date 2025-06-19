<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\LaporanPendapatan;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanPendapatanExport;

class LaporanPendapatanController extends Controller
{
    public function index(Request $request)
    {
        $laporan = LaporanPendapatan::query()
            ->when($request->tanggal_awal && $request->tanggal_akhir, function ($q) use ($request) {
                $q->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir]);
            })
            ->when($request->nama_pemesan, function ($q) use ($request) {
                $q->where('nama_pemesan', 'like', '%'.$request->nama_pemesan.'%');
            })
            ->get();

        $total = $laporan->where('status_pembayaran', 'Done')->sum('harga_booking');


        return view('admin.pages.laporan.index', compact('laporan', 'total'));
    }
    public function export(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        if (!$tanggalAwal || !$tanggalAkhir) {
            return back()->with('error', 'Tanggal filter diperlukan untuk export.');
        }

        $export = new LaporanPendapatanExport($tanggalAwal, $tanggalAkhir);
        $filename = "laporan_{$tanggalAwal}_sampai_{$tanggalAkhir}.xlsx";

        return Excel::download($export, $filename);
    }


    public function generate()
    {
        $bookings = Booking::with(['user', 'field'])
            ->get();

        foreach ($bookings as $booking) {
            $statusPembayaran = match ($booking->status) {
                    'Done' => 'Done',
                    'Pending', 'Approved' => 'Pending',
                    'Rejected' => 'Rejected',
                    default => 'Pending', // fallback untuk jaga-jaga
                };
            LaporanPendapatan::updateOrCreate(
                ['booking_id' => $booking->id],
                [
                    'tanggal_laporan' => Carbon::now()->toDateString(),
                    'nama_pemesan' => $booking->user->name,
                    'nama_lapangan' => $booking->field->nama_lapangan,
                    'tanggal' => $booking->tanggal,
                    'jam_mulai' => $booking->jam_mulai,
                    'jam_selesai' => $booking->jam_selesai,
                    'harga_booking' => $booking->harga_booking,
                    'status_pembayaran' => $statusPembayaran,

                ]
            );
        }

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil digenerate.');
    }
}
