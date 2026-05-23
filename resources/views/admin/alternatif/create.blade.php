@extends('layouts.app')

@section('title', 'Tambah Alternatif')

@section('content')
<div class="welcome-box">
    <h2>Tambah Alternatif</h2>
</div>

<form method="POST" action="{{ route('alternatif.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Nama Alternatif</label>
        <input type="text" name="nama" class="form-control" required>
    </div>


    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>

    {{-- Upload Gambar --}}
    <div class="mb-3">
        <label class="form-label">Gambar</label>

        <input 
            type="file" 
            name="gambar" 
            class="form-control"
            accept=".jpg,.jpeg,.png,.webp"
            required
        >

        <small class="text-muted">
            Format: JPG, JPEG, PNG, WEBP (maksimal 2MB)
        </small>

        @error('gambar')
            <small class="text-danger d-block">{{ $message }}</small>
        @enderror
    </div>


    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
