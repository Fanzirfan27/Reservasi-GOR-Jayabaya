<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Admin\BookingController;

class FieldController extends Controller
{
    // Menampilkan semua data lapangan
    public function index()
    {
        $fields = Field::all();
        return view('admin.pages.field.index', compact('fields'));
    }

    // Form tambah lapangan
    public function create()
    {
        return view('admin.pages.field.create');
    }

    // Simpan lapangan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required|string|max:100',
            'jenis' => 'required|in:futsal,basket,voli',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_lapangan', 'jenis', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/lapangan'), $namaFile);
            $data['foto'] = $namaFile;
        }

        Field::create($data);

        return redirect()->route('fields.index')->with('success', 'Lapangan berhasil ditambahkan.');
    }

    // Form edit lapangan
    public function edit(Field $field)
    {
        return view('admin.pages.field.edit', compact('field'));
    }

    // Update data lapangan
    public function update(Request $request, Field $field)
    {
        $request->validate([
            'nama_lapangan' => 'required|string|max:100',
            'jenis' => 'required|in:futsal,basket,voli',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama_lapangan', 'jenis', 'deskripsi']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($field->foto && file_exists(public_path('uploads/lapangan/' . $field->foto))) {
                File::delete(public_path('uploads/lapangan/' . $field->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/lapangan'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $field->update($data);

        return redirect()->route('fields.index')->with('success', 'Data lapangan berhasil diperbarui.');
    }

    // Hapus lapangan
    public function destroy(Field $field)
    {
        // Hapus file gambar jika ada
        if ($field->foto && file_exists(public_path('uploads/lapangan/' . $field->foto))) {
            File::delete(public_path('uploads/lapangan/' . $field->foto));
        }

        $field->delete();

        return redirect()->route('fields.index')->with('success', 'Data lapangan berhasil dihapus.');
    }

    public function indexUser()
    {
        $fields = Field::all()->groupBy('jenis');
        return view('user.penyewaanLapangan', compact('fields'));
    }


    public function showVoli()
    {
    $fields = Field::with('prices')->where('jenis', 'voli')->get();
    $bookingController = new BookingController();
    $bookingsByField = [];
    foreach ($fields as $field) {
        $bookingsByField[$field->id] = $bookingController->getBookingsByField($field->nama_lapangan, $field->jenis);
    }
    return view('user.voli', compact('fields', 'bookingsByField'));
    }
    public function showBasket()
    {
    $fields = Field::with('prices')->where('jenis', 'basket')->get();
    $bookingController = new BookingController();
    $bookingsByField = [];
    foreach ($fields as $field) {
        $bookingsByField[$field->id] = $bookingController->getBookingsByField($field->nama_lapangan, $field->jenis);
    }
    return view('user.basket', compact('fields', 'bookingsByField'));
}

public function showFutsal()
{
    $fields = Field::with('prices')->where('jenis', 'futsal')->get();
    $bookingController = new BookingController();

    $bookingsByField = [];

    foreach ($fields as $field) {
        $bookingsByField[$field->id] = $bookingController->getBookingsByField($field->nama_lapangan, $field->jenis);
    }

    return view('user.futsal', compact('fields', 'bookingsByField'));
}

}
