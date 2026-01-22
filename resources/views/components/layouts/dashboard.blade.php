<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? 'Dashboard' }} - {{ config('app.name') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js included with Livewire -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-full bg-gray-50">
    <div class="min-h-full flex">
        <!-- Sidebar -->
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow bg-gradient-to-b from-navy-900 via-navy-800 to-navy-900 pt-5 pb-4 overflow-y-auto shadow-2xl border-r border-navy-700">
                    <!-- Logo/Brand -->
                    <div class="flex items-center flex-shrink-0 px-4 mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-br from-green-500 to-green-600 p-2 rounded-lg shadow-lg">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <h1 class="text-white text-xl font-bold font-heading tracking-tight">SIMASJID</h1>
                        </div>
                    </div>
                    
                    <div class="mt-2 flex-1 flex flex-col px-3">
                        <nav class="flex-1 space-y-1">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                
                                <a href="{{ route('admin.profil-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.profil-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.profil-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    Profil Masjid
                                </a>
                                
                                <a href="{{ route('admin.kegiatan-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.kegiatan-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.kegiatan-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Kegiatan Masjid
                                </a>
                                
                                <a href="{{ route('admin.artikel-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.artikel-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.artikel-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Artikel Masjid
                                </a>
                                
                                <a href="{{ route('admin.kajian-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.kajian-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.kajian-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Kajian Masjid
                                </a>
                                
                                <a href="{{ route('admin.konten-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.konten-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.konten-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Konten Masjid
                                </a>
                                
                                <a href="{{ route('admin.kitab-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.kitab-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.kitab-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Kitab
                                </a>
                                
                                <a href="{{ route('admin.alquran-masjid.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.alquran-masjid.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.alquran-masjid.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    AL-Quran
                                </a>
                                
                                <a href="{{ route('admin.tpq.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.tpq.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.tpq.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    TPQ
                                </a>
                                
                                <a href="{{ route('admin.mualaf.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.mualaf.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.mualaf.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Mualaf
                                </a>
                                
                                <a href="{{ route('admin.infaq.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.infaq.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('admin.infaq.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Infaq
                                </a>
                            @elseif(auth()->user()->isKeuangan())
                                <a href="{{ route('pengelola-keuangan.infaq.index') }}" class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('pengelola-keuangan.infaq.*') ? 'bg-gradient-to-r from-green-600 to-green-700 text-white shadow-lg shadow-green-500/30' : 'text-gray-300 hover:bg-navy-700/50 hover:text-white' }}">
                                    <svg class="mr-3 h-5 w-5 {{ request()->routeIs('pengelola-keuangan.infaq.*') ? 'text-white' : 'text-green-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Infaq
                                </a>
                            @endif
                            
                            <div class="pt-4 mt-4 border-t border-navy-700">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="group flex items-center w-full px-3 py-2.5 text-sm font-medium text-red-300 rounded-lg hover:bg-red-900/20 hover:text-red-200 transition-all duration-200">
                                        <svg class="mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Topbar -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow-md border-b-2 border-green-600">
                <div class="flex-1 px-6 flex justify-between items-center">
                    <div class="flex-1 flex">
                        <h2 class="text-2xl font-bold font-heading text-navy-900">
                            {{ $title ?? 'Dashboard' }}
                        </h2>
                    </div>
                    <div class="ml-4 flex items-center">
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <p class="text-sm font-medium text-navy-900">{{ auth()->user()->username }}</p>
                                <p class="text-xs text-gray-500">{{ auth()->user()->isAdmin() ? 'Administrator' : 'Pengelola Keuangan' }}</p>
                            </div>
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center shadow-md">
                                <span class="text-white font-semibold text-sm">{{ strtoupper(substr(auth()->user()->username, 0, 1)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-6 px-6">
                    <div class="max-w-7xl mx-auto">
                        @if(session('success'))
                            <div class="mb-6 bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-6 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">Terjadi kesalahan:</p>
                                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
