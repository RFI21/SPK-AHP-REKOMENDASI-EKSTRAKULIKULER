@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Tambah Kriteria</h3>

  <form method="POST" action="{{ route('kriteria.store') }}">
    @csrf
    <div class="mb-3">
      <label>Nama Kriteria</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
