<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EkskulMatch - SPK Pemilihan Ekstrakurikuler</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter & Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
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
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }
    </style>
</head>
<body class="text-slate-800">

@include('layouts.header')


 <section id="ekstrakurikuler" class="py-24 bg-slate-50 px-4">
    <div class="max-w-7xl mx-auto">

        <!-- Heading -->
        <div class="text-center mb-16">
            <span class="text-blue-600 font-semibold uppercase tracking-[0.2em] text-sm">
                Ekstrakurikuler
            </span>

            <h2 class="mt-3 text-4xl font-bold text-slate-900 font-poppins">
                Daftar Pilihan Ekstrakurikuler
            </h2>

            <p class="mt-4 text-slate-500 max-w-2xl mx-auto">
                Berbagai kegiatan pengembangan bakat dan minat siswa
                untuk menunjang kreativitas, disiplin, dan kerja sama tim.
            </p>
        </div>

<!-- Card Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

    @forelse($alternatif as $item)

    <div class="group bg-white rounded-3xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

        <!-- Gambar -->
        <div class="relative overflow-hidden h-48">

            <img
                src="{{ asset('storage/' . $item->gambar) }}"
                alt="{{ $item->nama }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            >

            <!-- Badge -->
            <div class="absolute top-4 left-4">
                <span class="bg-blue-600 text-white text-[11px] font-semibold px-3 py-1 rounded-full shadow">
                    Ekstrakurikuler
                </span>
            </div>

        </div>

        <!-- Content -->
        <div class="p-5">

            <!-- Judul -->
            <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-1">
                {{ $item->nama }}
            </h3>

            <!-- Deskripsi -->
            <p class="mt-2 text-sm text-slate-500 leading-relaxed line-clamp-3 min-h-[60px]">
                {{ $item->deskripsi }}
            </p>

            <!-- Footer -->
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center justify-end">

<a href="{{ route('detail.show', $item->id) }}" 
   class="text-blue-600 text-sm font-semibold hover:gap-2 transition-all flex items-center gap-1">
    
    Detail
    <span>→</span>

</a>

            </div>
        </div>
    </div>

    @empty

    <div class="col-span-full">
        <div class="bg-white rounded-2xl p-10 text-center border border-slate-200">

            <h3 class="text-xl font-bold text-slate-700">
                Belum Ada Data
            </h3>

            <p class="text-slate-500 mt-2">
                Data ekstrakurikuler belum tersedia.
            </p>

        </div>
    </div>

    @endforelse

</div>
        </div>
    </div>
</section>



@include('layouts.footer')


    <!-- Initializing Lucide Icons -->
    <script>
        lucide.createIcons();
        
        // Mobile simple scroll behavior
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });
    </script>
</body>
</html>