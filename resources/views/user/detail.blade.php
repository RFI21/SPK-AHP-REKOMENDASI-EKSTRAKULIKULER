<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EkskulMatch - SPK Pemilihan Ekstrakurikuler</title>
    
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
</style>
</head>
<body class="text-slate-800">

@include('layouts.header')




<div class="min-h-screen pt-10 pb-20 px-4">
    <div class="max-w-5xl mx-auto">
        

        <div class="mt-10 bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100 flex flex-col md:flex-row">
            
            <!-- Image Section -->
            <div class="md:w-5/12 relative h-[300px] md:h-auto">
    @if($alternatif->gambar)
    <img 
        src="{{ asset('storage/' . $alternatif->gambar) }}" 
        alt="{{ $alternatif->nama }}"
        class="w-full h-full object-cover"
    >
@else
    <img 
        src="https://placehold.co/600x800/e2e8f0/64748b?text=Foto+Ekskul" 
        alt="Default"
        class="w-full h-full object-cover"
    >
@endif

                <!-- Badge Kategori (Opsional, jika ada data kategori) -->
                <div class="absolute top-6 left-6">
                    <span class="px-4 py-2 bg-blue-600/90 backdrop-blur-md text-white text-xs font-bold rounded-full shadow-lg">
                        EKSTRAKURIKULER
                    </span>
                </div>
            </div>

            <!-- Info Section -->
            <div class="md:w-7/12 p-8 md:p-12 flex flex-col">
                <div class="mb-8">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">{{ $alternatif->nama }}</h1>
          
                </div>

                <!-- Info Grid (Jadwal, Prestasi, Fasilitas) -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    {{-- <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                        <div class="flex items-center gap-2 text-slate-400 mb-1">
                            <i data-lucide="clock" class="w-4 h-4"></i>
                            <span class="text-xs font-bold uppercase tracking-wider">Jadwal Rutin</span>
                        </div>
                        <p class="text-slate-700 font-bold">Sabtu, 14.00 WITA</p>
                    </div> --}}

                </div>

                <div class="mb-10">
                    <h3 class="flex items-center gap-2 text-lg font-bold text-slate-800 mb-4">
                        <i data-lucide="align-left" class="w-5 h-5 text-blue-600"></i>
                        Tentang Ekskul
                    </h3>
                    <div class="prose prose-slate max-w-none text-slate-500 leading-relaxed italic">
                        "{{ $alternatif->deskripsi ?? 'Tidak ada deskripsi tersedia untuk ekstrakurikuler ini.' }}"
                    </div>
                </div>

                <!-- Action Buttons -->
                {{-- <div class="mt-auto pt-8 border-t border-slate-100 flex flex-wrap gap-4">
                    @php
                        $from = session('from_page', 'index'); 
                    @endphp

                    @if($from == 'hasil')
                        <form action="{{ route('pembeli.hasil') }}" method="POST" class="inline">
                            @csrf
                            <button class="inline-flex items-center gap-2 px-6 py-3 bg-slate-800 text-white font-bold rounded-2xl hover:bg-slate-900 transition-all shadow-lg shadow-slate-200">
                                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                                Kembali ke Hasil
                            </button>
                        </form>
                    @else
                        <a href="{{ route('index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition-all">
                            <i data-lucide="home" class="w-4 h-4"></i>
                            Kembali ke Beranda
                        </a>
                    @endif

                    <button class="inline-flex items-center gap-2 px-8 py-3 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-200 ml-auto">
                        Daftar Sekarang
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </button>
                </div> --}}
            </div>
        </div>

        <p class="text-center text-slate-400 text-xs mt-10 italic">
            Informasi di atas merupakan data resmi dari manajemen MAN Palopo.
        </p>
    </div>
</div>

<script>
    // Inisialisasi Ikon Lucide
    lucide.createIcons();
</script>
</body>
</html>