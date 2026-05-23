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


    <!-- Header Section (Beranda) tetap sama -->
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12">
    <section id="profil" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold font-poppins text-slate-900 tracking-tight">Profil <br>Madrasah Aliyah Negeri Palopo</h2>
                <div class="h-1.5 w-20 bg-blue-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Bagian Sambutan Kepala Sekolah -->
            <div class="flex flex-col lg:flex-row items-center gap-12 mb-20 bg-slate-50 p-8 lg:p-12 rounded-[3rem] border border-slate-100">
                <!-- Sisi Kiri: Foto & Nama -->
                <div class="w-full lg:w-1/3 text-center">
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-blue-600 rounded-2xl transform rotate-6 scale-105 opacity-10"></div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlbDdnqllQBn0VJUmdEY1_TFtmG6EaiUOrNA&s" 
                             alt="Kepala MAN Palopo" 
                             class="relative z-10 w-64 h-80 object-cover rounded-2xl shadow-xl border-4 border-white mx-auto grayscale hover:grayscale-0 transition-all duration-500">
                    </div>
                    <div class="mt-6">
                        <h3 class="text-xl font-bold text-slate-900 font-poppins">Dra. Hj. Jumrah, M.Pd.I.</h3>
                        <p class="text-blue-600 font-semibold text-sm uppercase tracking-widest mt-1">Kepala MAN Palopo</p>
                    </div>
                </div>

                <!-- Sisi Kanan: Pesan Sambutan -->
                <div class="w-full lg:w-2/3 relative">
                    <i data-lucide="quote" class="absolute -top-8 -left-4 w-16 h-16 text-blue-100 -z-10 transform -scale-x-100"></i>
                    <h4 class="text-2xl font-semibold text-slate-800 mb-6 font-poppins italic leading-snug">
                        "Membentuk Generasi Cerdas, Berakhlak Mulia, dan Siap Menghadapi Masa Depan."
                    </h4>
                    <div class="space-y-4 text-slate-600 leading-relaxed text-lg">
                        <p>
                            Assalamu'alaikum Warahmatullahi Wabarakatuh. Selamat datang di portal SPK Ekstrakurikuler MAN Palopo. Kami percaya bahwa setiap siswa memiliki potensi unik yang harus diasah sejak dini.
                        </p>
                        <p>
                            Ekstrakurikuler bukan sekadar kegiatan tambahan, melainkan wadah pembentukan karakter dan kepemimpinan. Melalui sistem rekomendasi ini, kami berharap para siswa dapat menemukan minat yang tepat untuk menunjang prestasi akademik maupun non-akademik mereka.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bagian Visi & Misi -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
<!-- Visi -->
<div class="bg-blue-600 text-white p-10 rounded-[2.5rem] shadow-xl shadow-blue-100 relative overflow-hidden group flex flex-col justify-center items-center text-center min-h-[320px]">

    <!-- Icon Background -->
    {{-- <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:scale-110 transition-transform">
        <i data-lucide="eye" class="w-24 h-24"></i>
    </div> --}}

    <!-- Content -->
    <div class="relative z-10">
        <h4 class="text-sm font-bold uppercase tracking-[0.2em] mb-4 text-blue-100">
            Visi Kami
        </h4>

        <p class="text-2xl font-bold font-poppins leading-tight max-w-xl">
            TERWUJUDNYA MADRASAH YANG RELIGIUS, CERDAS, KREATIF DAN KOMPETITIF.
        </p>
    </div>

</div>

                <!-- Misi -->
                <div class="bg-white border border-slate-200 p-10 rounded-[2.5rem] shadow-sm flex flex-col justify-center">
                    <h4 class="text-sm font-bold uppercase tracking-[0.2em] mb-6 text-blue-600">Misi Sekolah</h4>
<ul class="space-y-5">

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">1</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Meningkatkan pemahaman dan pengamalan ajaran Islam melalui proses pembelajaran dan pembiasaan.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">2</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Menyediakan sarana pembelajaran yang memenuhi Standar Nasional Pendidikan.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">3</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Melaksanakan pembelajaran yang aktif, inovatif, kreatif, efektif, dan menyenangkan.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">4</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Meningkatkan kemampuan berbahasa Arab dan Inggris warga madrasah.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">5</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Menerapkan Teknologi Informasi dan Komunikasi (TIK) dalam proses pembelajaran dan manajemen madrasah.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">6</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Menghasilkan lulusan yang mampu bersaing di tingkat nasional dan internasional.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">7</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Menerapkan manajemen partisipatif dengan melibatkan seluruh warga madrasah dan lembaga terkait.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">8</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Meningkatkan pribadi yang peduli terhadap lingkungan sosial, fisik, dan budaya.
        </p>
    </li>

    <li class="flex items-start gap-4">
        <div class="w-7 h-7 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1 shadow-sm">
            <span class="text-xs font-bold">9</span>
        </div>

        <p class="text-slate-600 leading-relaxed">
            Membentuk karakter peserta didik yang kreatif, kolaboratif, dan komunikatif.
        </p>
    </li>

</ul>
                </div>
            </div>
        </div>
    </section>
        </div>



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