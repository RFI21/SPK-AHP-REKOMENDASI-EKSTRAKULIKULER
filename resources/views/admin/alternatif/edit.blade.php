@extends('layouts.app')

@section('title', 'Edit Alternatif')

@section('content')
<div class="welcome-box">
    <h2>Edit Alternatif</h2>
</div>

<form action="{{ route('alternatif.update', $alternatif->id) }}" 
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

  {{-- Nama Alternatif --}}
    <div class="mb-3">
        <label class="form-label">Nama Alternatif</label>

        <input 
            type="text" 
            name="nama" 
            value="{{ old('nama', $alternatif->nama) }}"
            class="form-control" 
            required
        >

        @error('nama')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Deskripsi --}}
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>

        <textarea 
            name="deskripsi" 
            class="form-control"
            rows="4"
        >{{ old('deskripsi', $alternatif->deskripsi) }}</textarea>

        @error('deskripsi')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Gambar --}}
    <div class="mb-3">
        <label class="form-label">Gambar</label>

        <input 
            type="file" 
            name="gambar" 
            class="form-control"
            accept=".jpg,.jpeg,.png,.webp"
        >

        <small class="text-muted">
            Format: JPG, JPEG, PNG, WEBP (maksimal 2MB)
        </small>

        @error('gambar')
            <small class="text-danger d-block">{{ $message }}</small>
        @enderror
    </div>

    {{-- Preview gambar lama --}}
    @if($alternatif->gambar)
        <div class="mb-3">
            <img 
                src="{{ asset('storage/' . $alternatif->gambar) }}" 
                width="150"
                class="img-thumbnail"
            >
        </div>
    @endif


    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
