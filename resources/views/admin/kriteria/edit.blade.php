@extends('layouts.app')

@section('content')
<div class="container">
  <h3>Edit Kriteria</h3>

  <form method="POST" action="{{ route('kriteria.update', $kriteria->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label>Nama Kriteria</label>
      <input type="text" name="nama" value="{{ $kriteria->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control">{{ $kriteria->deskripsi }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
