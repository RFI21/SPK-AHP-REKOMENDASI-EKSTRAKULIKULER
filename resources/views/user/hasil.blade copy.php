@extends('layouts.main')

@section('title', 'Hasil Rekomendasi Perumahan')

@section('content')

<style>
    .detail-img-wrapper {
    width: 100%;
    height: 280px;
    overflow: hidden;
    border-radius: 12px 12px 0 0;
}

.detail-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

 

.detail-info {
    padding: 20px 5px;
}

.detail-title {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
}

.detail-price {
    font-size: 18px;
    margin-bottom: 10px;
}

.detail-address {
    font-size: 16px;
    margin-bottom: 15px;
}

.detail-description {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 10px;
}

.detail-description h4 {
    margin-bottom: 10px;
}

.btn-secondary {
    border-radius: 10px;
    padding: 8px 20px;
}

</style>



<div class="container my-5">

    {{-- Header Section --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">🏡 Rekomendasi Perumahan </h2>
   <p class="text-muted">
    Berikut hasil rekomendasi berdasarkan preferensi Anda terhadap kriteria.
</p>

@php $rank = 1; @endphp
@foreach($finalScores as $nama => $skor)
    @if($rank == 1)
        <div class="alert alert-success mt-3 shadow-sm">
            🎉 <strong>{{ $nama }}</strong> dengan skor <strong>{{ number_format($skor, 4) }}</strong> 
            adalah <span class="text-success fw-bold">Rekomendasi Terbaik</span> untuk Anda!. Karena {{ $keterangan[$nama] }}
        </div>
    @endif
    @php $rank++; @endphp
@endforeach

    </div>

    {{-- Card Section --}}
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" class="text-center">Peringkat</th>
                        <th scope="col">Nama Perumahan</th>
                        <th scope="col" class="text-center">Skor</th>
                        {{-- <th scope="col" class="text-center">Keterangan</th> --}}
                        <th scope="col" class="text-center">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @php $rank = 1; @endphp
                    @foreach($finalScores as $nama => $skor)
                        <tr @if($rank == 1) class="table-success" @endif>
                            <td class="text-center fw-bold">{{ $rank++ }}</td>
                            <td>{{ $nama }}</td>
                            <td class="text-center">{{ number_format($skor, 4) }}</td>
                            {{-- <td>
                                @foreach($detailScores[$nama] as $kriteria => $nilai)
                                    <div>
                                        <strong>{{ $kriteria }}:</strong> {{ number_format($nilai, 4) }}
                                    </div>
                                @endforeach
                            </td> --}}
                            {{-- <td>{{ $keterangan[$nama] }}</td> --}}
<td class="text-center">
    @php $alt = $altData[$nama]; @endphp

    <button 
        class="btn btn-sm btn-outline-info rounded-pill px-3 py-1" 
        data-bs-toggle="modal" 
        data-bs-target="#detailModal{{ $alt->id }}">
        🔍 Detail
    </button>

    <!-- Modal -->
    <div class="modal fade" id="detailModal{{ $alt->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $alt->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                                      <div class="detail-img-wrapper">
            {{-- @if($alt->gambar && filter_var($alt->gambar, FILTER_VALIDATE_URL))
                <img src="{{ $alt->gambar }}" class="detail-image" alt="{{ $alt->nama }}">
            @else
                <img src="https://dieng.blob.core.windows.net/storageciputramks/2023/05/CitraLand-Tallasa-City-1.jpeg" 
                     class="detail-image" alt="Default">
            @endif --}}
            
                            @php
    $imagePath = 'img/' . Str::slug($alt->nama) . '.jpeg';
@endphp

@if(file_exists(public_path($imagePath)))
    <img src="{{ asset($imagePath) }}" alt="{{ $alt->nama }}" class="perumahan-img">
@else
    <img src="{{ asset('images/perumahan/default.jpg') }}" alt="Default" class="perumahan-img">
@endif
                                      </div>

                            {{-- Info Detail --}}
        <div class="detail-info">

            <p class="detail-price text-start">
                💰 Harga : <b>Rp {{ number_format($alt->harga, 0, ',', '.') }}</b>
            </p>

            <p class="detail-address text-start">
                📍 Alamat : {{ $alt->alamat }}
            </p>

            <div class="detail-description text-start">
                <h4>📝 Deskripsi</h4>
                <p>{{ $alt->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</td>


                        </tr>

                    @endforeach
                </tbody>
            </table>

            {{-- CTA Button --}}
            <div class="text-center mt-4">
                <a href="{{ route('pembeli.form') }}" class="btn btn-lg btn-outline-primary px-4 py-2 rounded-pill shadow-sm">
                    🔁 Ulangi Penilaian
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
