<?php

namespace App\Exports;

use App\Models\LaporanPendapatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{
    FromCollection, WithHeadings, WithEvents, WithMapping
};
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

class LaporanPendapatanExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    protected $tanggalAwal;
    protected $tanggalAkhir;
    protected $data;

    public function __construct($tanggalAwal, $tanggalAkhir)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
    }

    public function collection(): Collection
    {
        $this->data = LaporanPendapatan::when($this->tanggalAwal && $this->tanggalAkhir, function ($query) {
            $query->whereBetween('tanggal', [$this->tanggalAwal, $this->tanggalAkhir]);
        })
        ->orderBy('tanggal')->get();

        return $this->data;
    }

    public function map($row): array
    {
        return [
            $row->nama_pemesan,
            $row->nama_lapangan,
            $row->tanggal,
            $row->jam_mulai,
            $row->jam_selesai,
            'Rp ' . number_format($row->harga_booking, 0, ',', '.'),
            $row->status_pembayaran,
        ];
    }

    public function headings(): array
    {
        return [
            ['Laporan Pendapatan Booking Lapangan'],
            ["Periode: {$this->tanggalAwal} s.d. {$this->tanggalAkhir}"],
            [],
            ['Nama Pemesan', 'Lapangan', 'Tanggal', 'Jam Mulai', 'Jam Selesai', 'Harga Booking', 'Status Pembayaran']
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet;

                $sheet->mergeCells('A1:G1');
                $sheet->mergeCells('A2:G2');

                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A2')->getFont()->setItalic(true);
            },

            AfterSheet::class => function (AfterSheet $event) {
            $sheet = $event->sheet;

            $headingRows = 6; // 3 judul + 1 baris header tabel
            $dataRows = $this->data->count();
            $rowCount = $headingRows + $dataRows + 1;

            $totalDone = $this->data->where('status_pembayaran', 'Done')->sum('harga_booking');

            $sheet->mergeCells("A{$rowCount}:F{$rowCount}");
            $sheet->setCellValue("A{$rowCount}", 'Total Pendapatan (status Done):');
            $sheet->setCellValue("G{$rowCount}", 'Rp ' . number_format($totalDone, 0, ',', '.'));

            $sheet->getStyle("A{$rowCount}:G{$rowCount}")->getFont()->setBold(true);
            $sheet->getStyle("A{$rowCount}:G{$rowCount}")->getFill()->applyFromArray([
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'D9EDF7'] // Biru muda
            ]);
        }
        ];

    }
}
