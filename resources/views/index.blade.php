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

    <header id="beranda" class="pt-32 pb-20 px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-wider">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    Tentukan Bakatmu Sekarang
                </div>
                <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 leading-tight font-poppins">
                    Temukan Ekskul yang <span class="text-blue-600 italic">Paling Pas</span> Buat Kamu!
                </h1>
                <p class="text-lg text-slate-600 max-w-2xl leading-relaxed">
                    Sistem Pendukung Keputusan cerdas menggunakan metode <b>AHP (Analytical Hierarchy Process)</b> untuk menganalisis minat, bakat, dan waktu luangmu demi rekomendasi ekstrakurikuler terbaik.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('rekomendasi.form') }}" class="px-8 py-4 bg-blue-600 text-white rounded-xl font-bold shadow-xl shadow-blue-200 hover:bg-blue-700 transition-all transform hover:-translate-y-1 text-center">
                        Mulai Sekarang
                    </a>
                    <a href="#ekstrakurikuler" class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-xl font-bold hover:bg-slate-50 transition-all text-center">
                        Lihat Daftar Ekskul
                    </a>
                </div>
            </div>
            <div class="flex-1 relative">
                <div class="relative z-10 w-full max-w-md mx-auto aspect-square bg-blue-50 rounded-[3rem] overflow-hidden border-8 border-white shadow-2xl">
                    <img src="https://blogger.googleusercontent.com/img/a/AVvXsEiRqUnr4jmtXMaQVZw9yI2Is3iaIXaLe7YlLf7zy_a8L6Vo-kKc81A9FXK9ccLPAQTToWPTrlFwx6DZKcWNbpijeODGk1y8QjKZyBbeRXfm2k8fjWZbJFk1E1CIufEIxcJU6mamb4EohaS8SPjV629UoRfMHicul7n3FOpYGd5yr3QhE6S26nQfYA4URK3T=s1600" alt="Students having fun" class="w-full h-full object-cover">
                </div>
                <!-- Abstract decorations -->
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-purple-600 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            </div>
        </div>
    </header>

    <section id="profil" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold font-poppins text-slate-900">Kenapa EkskulMatch?</h2>
                <div class="h-1.5 w-20 bg-blue-600 mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mx-auto mb-6">
                        <i data-lucide="clipboard-list" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Analisis Akurat</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Menggunakan perbandingan berpasangan (AHP) untuk menentukan kriteria yang paling penting bagi masa depanmu.</p>
                </div>
                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-600 mx-auto mb-6">
                        <i data-lucide="target" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Tujuan Terarah</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Membantu menyalurkan hobi menjadi prestasi yang membanggakan sekolah dan orang tua.</p>
                </div>
                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm card-hover border border-slate-100 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mx-auto mb-6">
                        <i data-lucide="zap" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Hasil Cepat</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">Dapatkan rekomendasi urutan ekstrakurikuler paling relevan hanya dalam hitungan menit.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="ekstrakurikuler" class="py-20 px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
        <!-- Heading -->
        <div class="text-center mb-16">
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

    @forelse($alternatif as $index => $item)

    <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 flex flex-col h-full alternatif-card
        {{ $index >= 3 ? 'hidden extra-card' : '' }}">

        <!-- Gambar -->
        <div class="relative h-56 overflow-hidden">

            <img 
                src="{{ asset('storage/' . $item->gambar) }}"
                alt="{{ $item->nama }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
            >

            <!-- Badge -->
            <span class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">
                Ekstrakurikuler
            </span>

        </div>

        <!-- Content -->
        <div class="p-6 flex flex-col flex-grow">

            <!-- Nama -->
            <h4 class="text-xl font-bold mb-2 group-hover:text-blue-600 transition-colors">
                {{ $item->nama }}
            </h4>

            <!-- Deskripsi -->
            <p class="text-slate-500 text-sm mb-6 flex-grow leading-relaxed">
                {{ Str::limit($item->deskripsi, 100) }}
            </p>

            <!-- Footer -->
            <div class="flex items-center justify-end pt-4 border-t border-slate-100">

                <a href="{{ route('detail.show', $item->id) }}" class="text-blue-600 font-bold text-sm hover:underline">
                    Detail →
                </a>

            </div>

        </div>
    </div>

    @empty

    <div class="col-span-full">
        <div class="bg-white border border-slate-200 rounded-3xl p-10 text-center">

            <div class="w-20 h-20 mx-auto rounded-full bg-slate-100 flex items-center justify-center mb-5">
                <i data-lucide="database" class="w-10 h-10 text-slate-400"></i>
            </div>

            <h3 class="text-2xl font-bold text-slate-700 mb-2">
                Belum Ada Data
            </h3>

            <p class="text-slate-500">
                Data ekstrakurikuler belum tersedia.
            </p>

        </div>
    </div>

    @endforelse

</div>




@if($alternatif->count() > 3)
<div class="mt-12 text-center">
    <button id="loadMoreBtn" class="text-slate-400 font-medium hover:text-slate-600 flex items-center gap-2 mx-auto transition-all">
        Muat Lebih Banyak
        <i data-lucide="chevron-down" class="w-4 h-4"></i>
    </button>
</div>
@endif
        </div>
    </section>

<section id="rekomendasi" class="py-20 bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <h2 class="text-4xl font-bold font-poppins mb-6">Siap Menemukan Jati Dirimu?</h2>
                <p class="text-blue-100 text-lg mb-8 leading-relaxed">
                    Jangan biarkan waktumu terbuang sia-sia. Masuk ke sistem rekomendasi kami, isi kriteria keinginanmu, dan biarkan metode AHP bekerja secara ilmiah untukmu.
                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 text-blue-400"></i>
                        </div>
                        <span class="text-sm font-medium">Mudah & Gratis</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 text-blue-400"></i>
                        </div>
                        <span class="text-sm font-medium">Berdasarkan Bakat</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 text-blue-400"></i>
                        </div>
                        <span class="text-sm font-medium">Tanpa Login</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
                            <i data-lucide="check" class="w-5 h-5 text-blue-400"></i>
                        </div>
                        <span class="text-sm font-medium">Hasil Akurat</span>
                    </div>
                </div>
                {{-- <a href="{{ route('rekomendasi.form') }}" class="px-10 py-4 bg-white text-blue-900 rounded-2xl font-bold hover:bg-blue-50 transition-all shadow-xl shadow-blue-950/20">
                    Buka Sistem Rekomendasi
                </a> --}}
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

    <script>
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    if(loadMoreBtn){
        loadMoreBtn.addEventListener('click', function(){

            document.querySelectorAll('.extra-card').forEach(card => {
                card.classList.remove('hidden');
            });

            loadMoreBtn.style.display = 'none';
        });
    }
</script>
</body>
</html>