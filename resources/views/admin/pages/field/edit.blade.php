@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h4>Edit Lapangan</h4>

    <form action="{{ route('fields.update', $field->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_lapangan">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" class="form-control" value="{{ $field->nama_lapangan }}" required>
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
            <textarea name="deskripsi" class="form-control">{{ $field->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto">Ganti Foto (kosongkan jika tidak diganti)</label>
            <input type="file" name="foto" class="form-control">
            @if($field->foto)
                <img src="{{ asset('uploads/lapangan/' . $field->foto) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('fields.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
