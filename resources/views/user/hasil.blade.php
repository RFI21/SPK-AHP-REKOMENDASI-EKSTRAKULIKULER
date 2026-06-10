<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi Ekskul - MAN Palopo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        .rank-1 {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .float-animation { animation: float 3s ease-in-out infinite; }
    </style>
</head>
<body class="text-slate-800">

@include('layouts.header')


    <main class="pt-32 pb-20 px-4">
        <div class="max-w-5xl mx-auto">
            
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight mb-4">Hasil Analisis Bakat</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">Berdasarkan perhitungan algoritma AHP terhadap preferensi kriteria Anda, berikut adalah urutan ekstrakurikuler yang paling direkomendasikan.</p>
            </div>

{{-- Ambil rekomendasi terbaik --}}
@php
    $rank = 1;
    $bestNama = array_key_first($finalScores);
    $bestSkor = reset($finalScores);
    $bestAlt = $altData[$bestNama] ?? null;
@endphp

<!-- BEST RECOMMENDATION -->
<div class="mb-12">

    <div class="rank-1 rounded-[2.5rem] p-8 md:p-12 text-white shadow-2xl shadow-blue-200 relative overflow-hidden flex flex-col lg:flex-row items-center gap-10">

        <!-- Blur Decoration -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

        <!-- Image -->
        <div class="relative z-10 flex-shrink-0">

            <div class="w-48 h-48 rounded-3xl overflow-hidden border border-white/20 shadow-2xl bg-white/10 backdrop-blur-md">

                @php
                    $imagePath = 'img/' . Str::slug($bestAlt->nama) . '.jpeg';
                @endphp

                @if(file_exists(public_path($imagePath)))
                    <img src="{{ asset($imagePath) }}"
                         alt="{{ $bestAlt->nama }}"
                         class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('images/perumahan/default.jpg') }}"
                         alt="Default"
                         class="w-full h-full object-cover">
                @endif

            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 flex-grow text-center lg:text-left">

            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 border border-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-5">
                🏆 Rekomendasi Terbaik
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold mb-5">
                {{ $bestNama }}
            </h1>

            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 mb-6">

                <div class="flex items-center gap-2">
                    <i data-lucide="star"
                       class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>

                    <span class="font-bold text-2xl">
                        {{ number_format($bestSkor, 4) }}
                    </span>
                </div>

                <div class="h-5 w-[1px] bg-white/30 hidden md:block"></div>

                <span class="text-blue-100 text-sm italic">
                    Skor tertinggi berdasarkan perhitungan AHP
                </span>

            </div>

            <p class="text-blue-50 leading-relaxed max-w-2xl">
                {{ $keterangan[$bestNama] }}
            </p>


        </div>
    </div>
</div>

<!-- TABLE RANKING -->
<div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">

    <!-- Header -->
    <div class="px-8 py-6 border-b border-slate-100 flex items-center gap-3">
        <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-600">
            <i data-lucide="table" class="w-6 h-6"></i>
        </div>

        <div>
            <h3 class="text-xl font-bold text-slate-800">
                Peringkat Alternatif
            </h3>

            <p class="text-sm text-slate-400">
                Urutan rekomendasi berdasarkan skor AHP
            </p>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>
                    <th class="px-6 py-5 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                        Rank
                    </th>

                    <th class="px-6 py-5 text-left text-[11px] font-bold uppercase tracking-widest text-slate-400">
                        Nama Ekskul
                    </th>

                    <th class="px-6 py-5 text-center text-[11px] font-bold uppercase tracking-widest text-slate-400">
                        Skor
                    </th>

                    <th class="px-6 py-5 text-center text-[11px] font-bold uppercase tracking-widest text-slate-400">
                        Aksi
                    </th>
                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @php $rank = 1; @endphp

                @foreach($finalScores as $nama => $skor)

                    @php
                        $alt = $altData[$nama];
                    @endphp

                    {{-- Skip rank 1 --}}
                    @if($rank == 1)
                        @php $rank++; @endphp
                        @continue
                    @endif

                    <tr class="hover:bg-slate-50 transition-all">

                        <!-- Rank -->
                        <td class="px-6 py-5">

                            <div class="w-10 h-10 rounded-2xl bg-slate-100 flex items-center justify-center font-bold text-slate-700">
                                {{ $rank }}
                            </div>

                        </td>

                        <!-- Nama -->
                        <td class="px-6 py-5">

                            <div class="flex items-center gap-4">

                                <!-- Image -->
                                <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">

                                    @php
                                        $imagePath = 'img/' . Str::slug($alt->nama) . '.jpeg';
                                    @endphp

                                    @if(file_exists(public_path($imagePath)))
                                        <img src="{{ asset($imagePath) }}"
                                             alt="{{ $alt->nama }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images/perumahan/default.jpg') }}"
                                             alt="Default"
                                             class="w-full h-full object-cover">
                                    @endif

                                </div>

                                <!-- Info -->
                                <div>

                                    <h4 class="font-bold text-slate-800">
                                        {{ $nama }}
                                    </h4>

                                    <p class="text-sm text-slate-400 mt-1 line-clamp-1">
                                        {{ $keterangan[$nama] }}
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- Score -->
                        <td class="px-6 py-5 text-center">

                            <span class="inline-flex px-4 py-2 rounded-full bg-blue-50 text-blue-600 font-bold text-sm">
                                {{ number_format($skor, 4) }}
                            </span>

                        </td>

                        <!-- Action -->
                        <td class="px-6 py-5 text-center">

                            <button
                                onclick="openModal('modal{{ $alt->id }}')"
                                class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-semibold hover:bg-blue-600 hover:text-white transition-all">

                                <i data-lucide="info" class="w-4 h-4"></i>

                                Detail
                            </button>

                        </td>

                    </tr>

                    <!-- MODAL -->
                    <div id="modal{{ $alt->id }}"
                         class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">

                        <div class="bg-white rounded-[2rem] max-w-2xl w-full overflow-hidden shadow-2xl relative">

                            <!-- Close -->
                            <button
                                onclick="closeModal('modal{{ $alt->id }}')"
                                class="absolute top-5 right-5 z-20 bg-white/90 hover:bg-white rounded-full p-2 shadow">

                                <i data-lucide="x" class="w-5 h-5"></i>
                            </button>

                            <!-- Image -->
                            <div class="h-72 overflow-hidden">

                                @if(file_exists(public_path($imagePath)))
                                    <img src="{{ asset($imagePath) }}"
                                         alt="{{ $alt->nama }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/perumahan/default.jpg') }}"
                                         alt="Default"
                                         class="w-full h-full object-cover">
                                @endif

                            </div>

                            <!-- Content -->
                            <div class="p-8">

                                <h2 class="text-3xl font-bold text-slate-800 mb-4">
                                    {{ $alt->nama }}
                                </h2>

                                <div class="space-y-4 text-slate-600">

                
                                    <div class="pt-4 border-t border-slate-100">

                                        <p class="text-sm text-slate-400 mb-2">
                                            Deskripsi
                                        </p>

                                        <p class="leading-relaxed">
                                            {{ $alt->deskripsi ?? 'Tidak ada deskripsi.' }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    @php $rank++; @endphp

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- CTA -->
<div class="mt-20 text-center">

    <a href="{{ route('rekomendasi.form') }}"
       class="inline-flex items-center gap-3 px-8 py-4 bg-white border-2 border-blue-600 text-blue-600 font-bold rounded-2xl hover:bg-blue-50 transition-all shadow-xl shadow-blue-100">

        <i data-lucide="rotate-ccw" class="w-5 h-5"></i>

        Ulangi Penilaian
    </a>

</div>


        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>

    <!-- Modal Script -->
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('flex');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.getElementById(id).classList.remove('flex');
    }
</script>
</body>
</html>
