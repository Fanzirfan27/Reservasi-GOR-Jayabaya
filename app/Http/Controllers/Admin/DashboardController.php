<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Booking;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $thisMonth = $today->format('Y-m');
        $lastMonth = $today->copy()->subMonth()->format('Y-m');

        // Reservasi Hari Ini
        $reservasiHariIni = Booking::whereDate('tanggal', $today)->count();

        // Pendapatan Bulan Ini
        $pendapatanBulanIni = Payment::whereMonth('created_at', $today->month)
                                    ->whereYear('created_at', $today->year)
                                    ->where('status', 'done')
                                    ->sum('jumlah');

        // Pendapatan Bulan Lalu
        $pendapatanBulanLalu = Payment::whereMonth('created_at', $today->copy()->subMonth()->month)
                                    ->whereYear('created_at', $today->copy()->subMonth()->year)
                                    ->where('status', 'done')
                                    ->sum('jumlah');

        // Hitung Persentase Kenaikan
        if ($pendapatanBulanLalu > 0) {
            $persentase = (($pendapatanBulanIni - $pendapatanBulanLalu) / $pendapatanBulanLalu) * 100;
        } else {
            $persentase = $pendapatanBulanIni > 0 ? 100 : 0;
        }

        // Reservasi Mendatang (besok)
        $reservasiBesok = Booking::whereDate('tanggal', $tomorrow)->count();

        // Statistik Reservasi Mingguan (Senin - Minggu)
        $mingguan = [];
        $senin = $today->copy()->startOfWeek(Carbon::MONDAY);
        for ($i = 0; $i < 7; $i++) {
            $tanggal = $senin->copy()->addDays($i);
            $mingguan[] = Booking::whereDate('tanggal', $tanggal)->count();
        }

        // Pendapatan per Bulan (Jan - Des)
        $pendapatanBulanan = [];
        for ($i = 1; $i <= 12; $i++) {
            $pendapatan = Payment::whereMonth('created_at', $i)
                                ->whereYear('created_at', $today->year)
                                ->where('status', 'done')
                                ->sum('jumlah');
            $pendapatanBulanan[] = $pendapatan;
        }

        return view('admin.DashboardAdmin', compact(
            'reservasiHariIni',
            'pendapatanBulanIni',
            'persentase',
            'reservasiBesok',
            'mingguan',
            'pendapatanBulanan'
        ));
    }
}
