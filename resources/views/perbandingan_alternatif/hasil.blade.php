@extends('layouts.app')

@section('title', 'Hasil AHP - Rekomendasi Perumahan')

@section('content')
<div class="welcome-box">
    <h2>Hasil Akhir AHP</h2>
    <p>Peringkat rekomendasi perumahan berdasarkan semua kriteria.</p>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Peringkat</th>
            <th>Nama Perumahan</th>
            <th>Skor Akhir</th>
        </tr>
    </thead>
    <tbody>
        @php $rank = 1; @endphp
        @foreach($finalScores as $alt => $score)
        <tr>
            <td>{{ $rank++ }}</td>
            <td>{{ $alt }}</td>
            <td>{{ number_format($score, 4) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
