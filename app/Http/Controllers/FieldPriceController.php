<?php

namespace App\Http\Controllers;

use App\Models\FieldPrice;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldPriceController extends Controller
    {

    public function index()
    {
        $prices = FieldPrice::with('field')->orderBy('jam_mulai')->get();
        $fields = Field::all();
        return view('admin.pages.field.field-prices.index', compact('prices', 'fields'));
    }
    public function create()
    {
        $fields = Field::all(); // untuk dropdown lapangan
        return view('admin.pages.field.field-prices.create', compact('fields'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'harga' => 'required|integer|min:0',
        ]);

        FieldPrice::create($request->only(['field_id', 'jam_mulai', 'jam_selesai', 'harga']));

        return redirect()->back()->with('success', 'Harga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $price = FieldPrice::findOrFail($id);
        $fields = Field::all();
        return view('admin.pages.field.field-prices.edit', compact('price', 'fields'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'field_id' => 'required|exists:fields,id',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'harga' => 'required|integer|min:0',
        ]);

        $price = FieldPrice::findOrFail($id);
        $price->update($request->all());

        return redirect()->route('field-prices.index')->with('success', 'Harga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $price = FieldPrice::findOrFail($id);
        $price->delete();

        return redirect()->route('field-prices.index')->with('success', 'Harga berhasil dihapus!');
    }
}