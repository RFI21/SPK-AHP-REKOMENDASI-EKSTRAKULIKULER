    <nav class="glass-nav fixed w-full z-50 top-0 left-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-blue-600 p-2 rounded-lg text-white">
                        <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xl font-bold font-poppins tracking-tight text-blue-900 uppercase">Ekskul<span class="text-blue-500">Match</span></span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="{{ route('index') }}" class="text-blue-600 {{ request()->routeIs('index') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }} hover:text-blue-700 transition-colors">Beranda</a>
                    <a href="{{ route('user.profil') }}" class="text-blue-600 {{ request()->routeIs('user.profil') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }} hover:text-blue-600 transition-colors">Profil</a>
                    <a href="{{ route('user.ekstra') }}" class="text-blue-600 {{ request()->routeIs('user.ekstra') ? 'text-blue-600' : 'text-slate-600 hover:text-blue-600' }} hover:text-blue-600 transition-colors">Ekstrakurikuler</a>
                    <a href="{{ route('rekomendasi.form') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-full hover:bg-blue-700 transition-all shadow-md shadow-blue-200">Rekomendasi</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-slate-600 p-2">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>