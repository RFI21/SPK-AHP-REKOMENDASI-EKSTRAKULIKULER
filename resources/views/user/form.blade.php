<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Preferensi Ekskul - MAN Palopo</title>
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
    </style>
</head>
<body class="text-slate-800">

@include('layouts.header')
 

    <main class="pt-32 pb-20 px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-50 rounded-2xl text-blue-600 mb-4">
                    <i data-lucide="settings-2" class="w-8 h-8"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">Form Preferensi Bakat</h2>
                <p class="text-slate-500 mt-3 max-w-lg mx-auto">
                    Tentukan tingkat kepentingan kriteria di bawah ini agar sistem AHP dapat memberikan rekomendasi ekskul yang paling cocok untuk Anda.
                </p>
            </div>

            <!-- Info Section / Petunjuk -->
            <div class="bg-blue-600 rounded-[2rem] p-8 md:p-10 text-white shadow-2xl shadow-blue-200 mb-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-6">
                        <i data-lucide="info" class="w-6 h-6"></i>
                        <h3 class="text-xl font-bold">Panduan Penilaian (Skala 1-9)</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <span class="bg-white/20 px-2 py-0.5 rounded font-bold">1</span>
                                <p><span class="font-bold">Tidak Penting:</span> Kriteria ini tidak mempengaruhi pilihan Anda sama sekali.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="bg-white/20 px-2 py-0.5 rounded font-bold">3</span>
                                <p><span class="font-bold">Kurang Penting:</span> Kriteria diperhatikan namun bukan hal utama.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="bg-white/20 px-2 py-0.5 rounded font-bold">5</span>
                                <p><span class="font-bold">Cukup Penting:</span> Memiliki pengaruh standar dalam keputusan Anda.</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <span class="bg-white/20 px-2 py-0.5 rounded font-bold">7</span>
                                <p><span class="font-bold">Penting:</span> Sangat mempengaruhi keputusan pemilihan ekskul.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="bg-white/20 px-2 py-0.5 rounded font-bold">9</span>
                                <p><span class="font-bold">Sangat Utama:</span> Menjadi prioritas mutlak yang tidak bisa ditawar.</p>
                            </div>
                            <p class="text-blue-100 italic text-xs mt-2">* Gunakan angka genap (2,4,6,8) untuk nilai di antara dua tingkat.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100">
                <div class="p-8 md:p-12">
                    <form method="POST" action="{{ route('rekomendasi.hasil') }}">
    @csrf

    <input type="hidden" name="nama_pembeli" value="Siswa MAN Palopo">

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            
            <thead>
                <tr class="border-b border-slate-100">
                    <th class="pb-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">
                        Kriteria Penilaian
                    </th>

                    <th class="pb-6 font-bold text-slate-400 uppercase tracking-widest text-[10px] text-center">
                        Tingkat Kepentingan
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-50">

                @foreach($kriteria as $krit)

                <tr class="group">

                    <!-- Nama Kriteria -->
                    <td class="py-8">
                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-all">
                                <i data-lucide="award" class="w-6 h-6"></i>
                            </div>

                            <div>
                                <h4 class="font-bold text-slate-800">
                                    {{ $krit->nama }}
                                </h4>

                                <p class="text-xs text-slate-400 mt-1">
                                    Tentukan seberapa penting kriteria ini bagi Anda.
                                </p>
                            </div>

                        </div>
                    </td>

                    <!-- Select Nilai -->
                    <td class="py-8">

                        @php
                            $value = $existing->nilai ?? 5;
                        @endphp

                        <select 
                            name="kriteria[{{ $krit->id }}]"
                            class="w-full max-w-[300px] mx-auto block bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-4 transition-all outline-none"
                        >
                            <option value="1" {{ $value==1 ? 'selected' : '' }}>
                                1 - Tidak penting
                            </option>

                            <option value="2" {{ $value==2 ? 'selected' : '' }}>
                                2 - Hampir tidak penting
                            </option>

                            <option value="3" {{ $value==3 ? 'selected' : '' }}>
                                3 - Kurang penting
                            </option>

                            <option value="4" {{ $value==4 ? 'selected' : '' }}>
                                4 - Mendekati cukup penting
                            </option>

                            <option value="5" {{ $value==5 ? 'selected' : '' }}>
                                5 - Cukup penting
                            </option>

                            <option value="6" {{ $value==6 ? 'selected' : '' }}>
                                6 - Mendekati penting
                            </option>

                            <option value="7" {{ $value==7 ? 'selected' : '' }}>
                                7 - Penting
                            </option>

                            <option value="8" {{ $value==8 ? 'selected' : '' }}>
                                8 - Sangat penting
                            </option>

                            <option value="9" {{ $value==9 ? 'selected' : '' }}>
                                9 - Sangat-sangat penting
                            </option>
                        </select>

                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Action Buttons -->
    <div class="mt-12 pt-8 border-t border-slate-50 flex flex-col sm:flex-row items-center justify-center gap-4">

        <a href="{{ route('index') }}"
           class="w-full sm:w-auto px-8 py-4 text-slate-600 font-bold rounded-2xl hover:bg-slate-50 transition-all flex items-center justify-center gap-2">
            
            <i data-lucide="arrow-left" class="w-5 h-5"></i>
            Kembali
        </a>

        <button type="submit"
                class="w-full sm:w-auto px-10 py-4 bg-blue-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all flex items-center justify-center gap-2">

            <i data-lucide="search" class="w-5 h-5"></i>
            Lihat Rekomendasi
        </button>

    </div>
</form>
                </div>
            </div>

        </div>
    </main>

    <script>
        // Inisialisasi Ikon Lucide
        lucide.createIcons();
    </script>
</body>
</html>