@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Lapangan</h4>

    <form action="{{ route('fields.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_lapangan">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="jenis" class="form-label">Jenis Lapangan</label>
          <select name="jenis" id="jenis" class="form-select" required>
              <option value="">-- Pilih Jenis --</option>
              <option value="futsal" {{ old('jenis', $field->jenis ?? '') == 'futsal' ? 'selected' : '' }}>Futsal</option>
              <option value="basket" {{ old('jenis', $field->jenis ?? '') == 'basket' ? 'selected' : '' }}>Basket</option>
              <option value="voli" {{ old('jenis', $field->jenis ?? '') == 'voli' ? 'selected' : '' }}>Voli</option>
          </select>
      </div>
      

        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('fields.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
