<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Islamic Center' }} - {{ config('app.name') }}</title>
    
    <meta name="description" content="{{ $description ?? 'Website resmi Islamic Center - Beranda, Kegiatan, Artikel, Kajian, Konten, dan Infaq' }}">
    <meta name="keywords" content="islamic center, masjid, kegiatan islam, kajian, artikel islam, infaq">
    <meta name="author" content="{{ config('app.name') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Islamic Center' }}">
    <meta property="og:description" content="{{ $description ?? 'Website resmi Islamic Center' }}">
    <meta property="og:image" content="{{ asset('picture/masjid.jpg') }}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Islamic Center' }}">
    <meta property="twitter:description" content="{{ $description ?? 'Website resmi Islamic Center' }}">
    <meta property="twitter:image" content="{{ asset('picture/masjid.jpg') }}">
    
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-white text-navy-900">
    <!-- Navigation -->
    <nav class="bg-nav sticky top-0 z-50 shadow-md" role="navigation" aria-label="Main navigation">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex items-center justify-between h-16 md:h-20">
                <!-- Left Logo - Small Emblem -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center" aria-label="Beranda">
                        <div class="bg-white rounded-full p-1.5 sm:p-2 flex items-center justify-center" style="max-height: 100%;">
                            <img 
                                src="{{ asset('picture/logo-riau.png') }}" 
                                alt="Logo Riau"
                                class="max-h-10 sm:max-h-12 w-auto object-contain"
                                loading="eager"
                            >
                        </div>
                    </a>
                </div>
                
                <!-- Center Menu - Desktop Only -->
                <div class="hidden lg:flex lg:items-center lg:space-x-6 xl:space-x-8 {{ auth()->check() && auth()->user()->isKeuangan() ? 'lg:justify-center' : '' }}">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <!-- Admin Menu -->
                            <a 
                                href="{{ route('admin.dashboard') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Dashboard"
                            >
                                Dashboard
                            </a>
                            <a 
                                href="{{ route('admin.profil-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.profil-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Profil"
                            >
                                Profil
                            </a>
                            <a 
                                href="{{ route('admin.kegiatan-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.kegiatan-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Kegiatan"
                            >
                                Kegiatan
                            </a>
                            <a 
                                href="{{ route('admin.artikel-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.artikel-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Artikel"
                            >
                                Artikel
                            </a>
                            <a 
                                href="{{ route('admin.kajian-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.kajian-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Kajian"
                            >
                                Kajian
                            </a>
                            <a 
                                href="{{ route('admin.konten-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.konten-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Konten"
                            >
                                Konten
                            </a>
                            <a 
                                href="{{ route('admin.kitab-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.kitab-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Kitab"
                            >
                                Kitab
                            </a>
                            <a 
                                href="{{ route('admin.alquran-masjid.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.alquran-masjid.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="AL-Quran"
                            >
                                AL-Quran
                            </a>
                            <a 
                                href="{{ route('admin.tpq.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.tpq.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="TPQ"
                            >
                                TPQ
                            </a>
                            <a 
                                href="{{ route('admin.mualaf.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.mualaf.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Mualaf"
                            >
                                Mualaf
                            </a>
                            <a 
                                href="{{ route('admin.infaq.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('admin.infaq.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Infaq"
                            >
                                Infaq
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 text-sm font-medium transition-colors duration-200 rounded-lg"
                                    aria-label="Logout"
                                >
                                    Logout
                                </button>
                            </form>
                        @elseif(auth()->user()->isKeuangan())
                            <!-- Pengelola Keuangan Menu - Only Infaq -->
                            <a 
                                href="{{ route('pengelola-keuangan.infaq.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('pengelola-keuangan.infaq.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Infaq"
                            >
                                Infaq
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('logout') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}"
                                    aria-label="Logout"
                                >
                                    Logout
                                </button>
                            </form>
                        @else
                            <!-- Public Menu (for non-admin authenticated users) -->
                            <a 
                                href="{{ route('home') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Beranda"
                            >
                                Beranda
                            </a>
                            <a 
                                href="{{ route('profil-masjid') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('profil-masjid') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Profil"
                            >
                                Profil
                            </a>
                            <a 
                                href="{{ route('kegiatan.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('kegiatan.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Kegiatan"
                            >
                                Kegiatan
                            </a>
                        <!-- Perpustakaan Dropdown -->
                        <div class="relative" id="perpustakaan-dropdown-container">
                            <button 
                                type="button"
                                id="perpustakaan-dropdown-button"
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('artikel.*') || request()->routeIs('kitab.*') || request()->routeIs('alquran.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }} flex items-center"
                                aria-label="Perpustakaan"
                                aria-expanded="false"
                            >
                                Perpustakaan
                                <svg id="perpustakaan-chevron" class="ml-1 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="perpustakaan-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-navy-900 rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('artikel.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('artikel.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    Artikel
                                </a>
                                <a href="{{ route('kitab.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('kitab.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    Kitab
                                </a>
                                <a href="{{ route('alquran.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('alquran.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    AL-Quran
                                </a>
                            </div>
                        </div>
                            <a 
                                href="{{ route('kajian.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('kajian.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Kajian"
                            >
                                Kajian
                            </a>
                            <a 
                                href="{{ route('konten.index') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('konten.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Konten"
                            >
                                Konten
                            </a>
                        <!-- Layanan Dropdown -->
                        <div class="relative" id="layanan-dropdown-container">
                            <button 
                                type="button"
                                id="layanan-dropdown-button"
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('tpq.*') || request()->routeIs('mualaf.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }} flex items-center"
                                aria-label="Layanan"
                                aria-expanded="false"
                            >
                                Layanan
                                <svg id="layanan-chevron" class="ml-1 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="layanan-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-navy-900 rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('tpq.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('tpq.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    TPQ
                                </a>
                                <a href="{{ route('mualaf.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    Mualaf
                                </a>
                            </div>
                        </div>
                            <a 
                                href="{{ route('infaq') }}" 
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('infaq') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                                aria-label="Infaq"
                            >
                                Infaq
                            </a>
                        @endif
                    @else
                        <!-- Public Menu (for guests) -->
                        <a 
                            href="{{ route('home') }}" 
                            class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                            aria-label="Beranda"
                        >
                            Beranda
                        </a>
                        <a 
                            href="{{ route('profil-masjid') }}" 
                            class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('profil-masjid') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                            aria-label="Profil"
                        >
                            Profil
                        </a>
                        <a 
                            href="{{ route('kegiatan.index') }}" 
                            class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('kegiatan.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                            aria-label="Kegiatan"
                        >
                            Kegiatan
                        </a>
                        <!-- Perpustakaan Dropdown -->
                        <div class="relative group">
                            <button 
                                type="button"
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('artikel.*') || request()->routeIs('kitab.*') || request()->routeIs('alquran.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }} flex items-center"
                                aria-label="Perpustakaan"
                                aria-expanded="false"
                                id="perpustakaan-dropdown-button"
                            >
                                Perpustakaan
                                <svg class="ml-1 h-4 w-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="perpustakaan-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-navy-900 rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('artikel.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('artikel.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    Artikel
                                </a>
                                <a href="{{ route('kitab.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('kitab.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    Kitab
                                </a>
                                <a href="{{ route('alquran.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('alquran.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    AL-Quran
                                </a>
                            </div>
                        </div>
                        <a 
                            href="{{ route('kajian.index') }}" 
                            class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('kajian.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                            aria-label="Kajian"
                        >
                            Kajian
                        </a>
                        <a 
                            href="{{ route('konten.index') }}" 
                            class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('konten.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                            aria-label="Konten"
                        >
                            Konten
                        </a>
                        <!-- Layanan Dropdown -->
                        <div class="relative" id="layanan-dropdown-container">
                            <button 
                                type="button"
                                id="layanan-dropdown-button"
                                class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('tpq.*') || request()->routeIs('mualaf.*') ? 'text-gold-300 border-b-2 border-gold-300' : '' }} flex items-center"
                                aria-label="Layanan"
                                aria-expanded="false"
                            >
                                Layanan
                                <svg id="layanan-chevron" class="ml-1 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="layanan-dropdown" class="hidden absolute left-0 mt-2 w-48 bg-navy-900 rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('tpq.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('tpq.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    TPQ
                                </a>
                                <a href="{{ route('mualaf.index') }}" class="block px-4 py-2 text-sm text-white hover:bg-navy-800 hover:text-gold-300 transition-colors {{ request()->routeIs('mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}">
                                    Mualaf
                                </a>
                            </div>
                        </div>
                        <a 
                            href="{{ route('infaq') }}" 
                            class="text-white hover:text-gold-300 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('infaq') ? 'text-gold-300 border-b-2 border-gold-300' : '' }}" 
                            aria-label="Infaq"
                        >
                            Infaq
                        </a>
                    @endauth
                </div>
                
                <!-- Right Logo - Desktop -->
                <div class="hidden lg:flex lg:items-center">
                    <div class="bg-white rounded-full p-1.5 sm:p-2 flex items-center justify-center" style="max-height: 100%;">
                        <img 
                            src="{{ asset('picture/logo-kampar.png') }}" 
                            alt="Logo Kampar"
                            class="max-h-10 sm:max-h-12 w-auto object-contain"
                            loading="eager"
                        >
                    </div>
                </div>
                
                <!-- Mobile Menu Button and Infaq -->
                <div class="lg:hidden flex items-center space-x-3">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a 
                                href="{{ route('admin.infaq.index') }}" 
                                class="bg-gold-500 hover:bg-gold-600 text-navy-900 px-3 py-2 rounded-lg font-semibold text-xs transition-colors whitespace-nowrap"
                                aria-label="Infaq"
                            >
                                Infaq
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg font-semibold text-xs transition-colors whitespace-nowrap"
                                    aria-label="Logout"
                                >
                                    Logout
                                </button>
                            </form>
                        @elseif(auth()->user()->isKeuangan())
                            <a 
                                href="{{ route('pengelola-keuangan.infaq.index') }}" 
                                class="bg-gold-500 hover:bg-gold-600 text-navy-900 px-3 py-2 rounded-lg font-semibold text-xs transition-colors whitespace-nowrap"
                                aria-label="Infaq"
                            >
                                Infaq
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg font-semibold text-xs transition-colors whitespace-nowrap"
                                    aria-label="Logout"
                                >
                                    Logout
                                </button>
                            </form>
                        @else
                            <a 
                                href="{{ route('infaq') }}" 
                                class="bg-gold-500 hover:bg-gold-600 text-navy-900 px-3 py-2 rounded-lg font-semibold text-xs transition-colors whitespace-nowrap"
                                aria-label="Infaq"
                            >
                                Infaq
                            </a>
                        @endif
                    @else
                        <a 
                            href="{{ route('infaq') }}" 
                            class="bg-gold-500 hover:bg-gold-600 text-navy-900 px-3 py-2 rounded-lg font-semibold text-xs transition-colors whitespace-nowrap"
                            aria-label="Infaq"
                        >
                            Infaq
                        </a>
                    @endauth
                    <button 
                        type="button" 
                        class="text-white hover:text-gold-300 focus:outline-none focus:ring-2 focus:ring-gold-300 rounded-md p-2 transition-colors"
                        aria-label="Toggle menu"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                        id="mobile-menu-button"
                    >
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="menu-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="close-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu - Slide Over -->
        <div 
            class="hidden lg:hidden bg-navy-900/95 backdrop-blur-sm border-t border-white/10" 
            id="mobile-menu" 
            role="menu" 
            aria-label="Mobile navigation"
        >
            <div class="px-2 pt-2 pb-4 space-y-1">
                @auth
                    @if(auth()->user()->isAdmin())
                        <!-- Admin Menu -->
                        <a 
                            href="{{ route('admin.dashboard') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Dashboard
                        </a>
                        <a 
                            href="{{ route('admin.profil-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.profil-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Profil
                        </a>
                        <a 
                            href="{{ route('admin.kegiatan-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.kegiatan-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Kegiatan
                        </a>
                        <a 
                            href="{{ route('admin.artikel-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.artikel-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Artikel
                        </a>
                        <a 
                            href="{{ route('admin.kajian-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.kajian-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Kajian
                        </a>
                        <a 
                            href="{{ route('admin.konten-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.konten-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Konten
                        </a>
                        <a 
                            href="{{ route('admin.kitab-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.kitab-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Kitab
                        </a>
                        <a 
                            href="{{ route('admin.alquran-masjid.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.alquran-masjid.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            AL-Quran
                        </a>
                        <a 
                            href="{{ route('admin.tpq.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.tpq.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            TPQ
                        </a>
                        <a 
                            href="{{ route('admin.mualaf.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Mualaf
                        </a>
                        <a 
                            href="{{ route('admin.infaq.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('admin.infaq.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Infaq
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button 
                                type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white w-full text-left block px-3 py-2.5 rounded-md text-base font-medium transition-colors"
                                role="menuitem"
                                aria-label="Logout"
                            >
                                Logout
                            </button>
                        </form>
                    @elseif(auth()->user()->isKeuangan())
                        <!-- Pengelola Keuangan Menu - Only Infaq -->
                        <a 
                            href="{{ route('pengelola-keuangan.infaq.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('pengelola-keuangan.infaq.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Infaq
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button 
                                type="submit" 
                                class="text-white hover:bg-navy-800 w-full text-left block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('logout') ? 'bg-navy-800 text-gold-300' : '' }}"
                                role="menuitem"
                                aria-label="Logout"
                            >
                                Logout
                            </button>
                        </form>
                    @else
                        <!-- Public Menu (for non-admin authenticated users) -->
                        <a 
                            href="{{ route('home') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('home') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Beranda
                        </a>
                        <a 
                            href="{{ route('profil-masjid') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('profil-masjid') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Profil
                        </a>
                        <a 
                            href="{{ route('kegiatan.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('kegiatan.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Kegiatan
                        </a>
                        <!-- Perpustakaan Dropdown Mobile -->
                        <div>
                            <button 
                                type="button"
                                id="mobile-perpustakaan-dropdown-button"
                                class="w-full flex items-center justify-between px-3 py-2.5 text-white hover:bg-navy-800 rounded-md text-base font-medium transition-colors {{ request()->routeIs('artikel.*') || request()->routeIs('kitab.*') || request()->routeIs('alquran.*') ? 'bg-navy-800 text-gold-300' : '' }}"
                                aria-label="Perpustakaan"
                                aria-expanded="false"
                            >
                                <span>Perpustakaan</span>
                                <svg id="mobile-perpustakaan-chevron" class="ml-2 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="mobile-perpustakaan-dropdown" class="hidden pl-4">
                                <a 
                                    href="{{ route('artikel.index') }}" 
                                    class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('artikel.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                    role="menuitem"
                                >
                                    Artikel
                                </a>
                                <a 
                                    href="{{ route('kitab.index') }}" 
                                    class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('kitab.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                    role="menuitem"
                                >
                                    Kitab
                                </a>
                                <a 
                                    href="{{ route('alquran.index') }}" 
                                    class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('alquran.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                    role="menuitem"
                                >
                                    AL-Quran
                                </a>
                            </div>
                        </div>
                        <a 
                            href="{{ route('kajian.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('kajian.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Kajian
                        </a>
                        <a 
                            href="{{ route('konten.index') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('konten.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Konten
                        </a>
                        <!-- Layanan Dropdown Mobile -->
                        <div>
                            <button 
                                type="button"
                                id="mobile-layanan-dropdown-button"
                                class="w-full flex items-center justify-between px-3 py-2.5 text-white hover:bg-navy-800 rounded-md text-base font-medium transition-colors {{ request()->routeIs('tpq.*') || request()->routeIs('mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}"
                                aria-label="Layanan"
                                aria-expanded="false"
                            >
                                <span>Layanan</span>
                                <svg id="mobile-layanan-chevron" class="ml-2 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="mobile-layanan-dropdown" class="hidden pl-4">
                                <a 
                                    href="{{ route('tpq.index') }}" 
                                    class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('tpq.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                    role="menuitem"
                                >
                                    TPQ
                                </a>
                                <a 
                                    href="{{ route('mualaf.index') }}" 
                                    class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                    role="menuitem"
                                >
                                    Mualaf
                                </a>
                            </div>
                        </div>
                        <a 
                            href="{{ route('infaq') }}" 
                            class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('infaq') ? 'bg-navy-800 text-gold-300' : '' }}" 
                            role="menuitem"
                        >
                            Infaq
                        </a>
                    @endif
                @else
                    <!-- Public Menu (for guests) -->
                    <a 
                        href="{{ route('home') }}" 
                        class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('home') ? 'bg-navy-800 text-gold-300' : '' }}" 
                        role="menuitem"
                    >
                        Beranda
                    </a>
                    <a 
                        href="{{ route('profil-masjid') }}" 
                        class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('profil-masjid') ? 'bg-navy-800 text-gold-300' : '' }}" 
                        role="menuitem"
                    >
                        Profil
                    </a>
                    <a 
                        href="{{ route('kegiatan.index') }}" 
                        class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('kegiatan.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                        role="menuitem"
                    >
                        Kegiatan
                    </a>
                    <!-- Perpustakaan Dropdown Mobile -->
                    <div>
                        <button 
                            type="button"
                            id="mobile-perpustakaan-dropdown-button-guest"
                            class="w-full flex items-center justify-between px-3 py-2.5 text-white hover:bg-navy-800 rounded-md text-base font-medium transition-colors {{ request()->routeIs('artikel.*') || request()->routeIs('kitab.*') || request()->routeIs('alquran.*') ? 'bg-navy-800 text-gold-300' : '' }}"
                            aria-label="Perpustakaan"
                            aria-expanded="false"
                        >
                            <span>Perpustakaan</span>
                            <svg id="mobile-perpustakaan-chevron-guest" class="ml-2 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobile-perpustakaan-dropdown-guest" class="hidden pl-4">
                            <a 
                                href="{{ route('artikel.index') }}" 
                                class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('artikel.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                role="menuitem"
                            >
                                Artikel
                            </a>
                            <a 
                                href="{{ route('kitab.index') }}" 
                                class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('kitab.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                role="menuitem"
                            >
                                Kitab
                            </a>
                            <a 
                                href="{{ route('alquran.index') }}" 
                                class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('alquran.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                role="menuitem"
                            >
                                AL-Quran
                            </a>
                        </div>
                    </div>
                    <a 
                        href="{{ route('kajian.index') }}" 
                        class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('kajian.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                        role="menuitem"
                    >
                        Kajian
                    </a>
                    <a 
                        href="{{ route('konten.index') }}" 
                        class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('konten.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                        role="menuitem"
                    >
                        Konten
                    </a>
                    <!-- Layanan Dropdown Mobile -->
                    <div>
                        <button 
                            type="button"
                            id="mobile-layanan-dropdown-button-guest"
                            class="w-full flex items-center justify-between px-3 py-2.5 text-white hover:bg-navy-800 rounded-md text-base font-medium transition-colors {{ request()->routeIs('tpq.*') || request()->routeIs('mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}"
                            aria-label="Layanan"
                            aria-expanded="false"
                        >
                            <span>Layanan</span>
                            <svg id="mobile-layanan-chevron-guest" class="ml-2 h-4 w-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobile-layanan-dropdown-guest" class="hidden pl-4">
                            <a 
                                href="{{ route('tpq.index') }}" 
                                class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('tpq.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                role="menuitem"
                            >
                                TPQ
                            </a>
                            <a 
                                href="{{ route('mualaf.index') }}" 
                                class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('mualaf.*') ? 'bg-navy-800 text-gold-300' : '' }}" 
                                role="menuitem"
                            >
                                Mualaf
                            </a>
                        </div>
                    </div>
                    <a 
                        href="{{ route('infaq') }}" 
                        class="text-white hover:bg-navy-800 block px-3 py-2.5 rounded-md text-base font-medium transition-colors {{ request()->routeIs('infaq') ? 'bg-navy-800 text-gold-300' : '' }}" 
                        role="menuitem"
                    >
                        Infaq
                    </a>
                @endauth
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main role="main" class="min-h-screen">
        {{ $slot }}
    </main>
    
    <!-- Footer -->
    <footer class="bg-nav text-white mt-16" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Contact Info -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-4 text-gold-300">Kontak</h3>
                    <address class="not-italic text-sm space-y-3">
                        <p class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Jl. Profesor Moh. Yamin SH No.439, Langgini, Kec. Bangkinang, Kabupaten Kampar,<br>Riau, Indonesia</span>
                        </p>
                        <p class="flex items-center">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:info@islamiccenter.com" class="hover:text-gold-300 transition-colors">info@islamiccenter.com</a>
                        </p>
                    </address>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-4 text-gold-300">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-gold-300 transition-colors">Beranda</a>
                        </li>
                        <li>
                            <a href="{{ route('kegiatan.index') }}" class="hover:text-gold-300 transition-colors">Kegiatan</a>
                        </li>
                        <li>
                            <a href="{{ route('artikel.index') }}" class="hover:text-gold-300 transition-colors">Artikel</a>
                        </li>
                        <li>
                            <a href="{{ route('kajian.index') }}" class="hover:text-gold-300 transition-colors">Kajian</a>
                        </li>
                        <li>
                            <a href="{{ route('konten.index') }}" class="hover:text-gold-300 transition-colors">Konten</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Resources -->

                
                <!-- Social Media -->
                <div>
                    <h3 class="font-heading font-semibold text-lg mb-4 text-gold-300">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a 
                            href="#" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="text-white hover:text-gold-300 transition-colors" 
                            aria-label="Facebook"
                        >
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a 
                            href="#" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="text-white hover:text-gold-300 transition-colors" 
                            aria-label="Instagram"
                        >
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a 
                            href="#" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="text-white hover:text-gold-300 transition-colors" 
                            aria-label="YouTube"
                        >
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-white/20 mt-8 pt-8 text-center text-sm">
                <p>&copy;  Teknik Informatika Politeknik Kampar.</p>
            </div>
        </div>
    </footer>
    
    @livewireScripts
    @stack('scripts')
</body>
</html>
