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
                <div class="flex flex-col flex-grow bg-navy-900 pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <h1 class="text-white text-xl font-bold">SIMASJID</h1>
                    </div>
                    <div class="mt-5 flex-1 flex flex-col">
                        <nav class="flex-1 px-2 space-y-1">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                
                                <a href="{{ route('admin.profil-masjid.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.profil-masjid.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    Profil Masjid
                                </a>
                                
                                <a href="{{ route('admin.kegiatan-masjid.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.kegiatan-masjid.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Kegiatan Masjid
                                </a>
                                
                                <a href="{{ route('admin.artikel-masjid.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.artikel-masjid.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Artikel Masjid
                                </a>
                                
                                <a href="{{ route('admin.kajian-masjid.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.kajian-masjid.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Kajian Masjid
                                </a>
                                
                                <a href="{{ route('admin.konten-masjid.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.konten-masjid.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Konten Masjid
                                </a>
                                
                                <a href="{{ route('admin.infaq.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('admin.infaq.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Infaq
                                </a>
                            @elseif(auth()->user()->isKeuangan())
                                <a href="{{ route('pengelola-keuangan.infaq.index') }}" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('pengelola-keuangan.infaq.*') ? 'bg-navy-800' : '' }}">
                                    <svg class="mr-3 h-6 w-6 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Infaq
                                </a>
                            @endif
                            
                            <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                                @csrf
                                <button type="submit" class="text-white hover:bg-navy-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md w-full">
                                    <svg class="mr-3 h-6 w-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Topbar -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                        <div class="w-full flex lg:ml-0">
                            <h2 class="text-2xl font-semibold text-navy-900 my-auto">
                                {{ $title ?? 'Dashboard' }}
                            </h2>
                        </div>
                    </div>
                    <div class="ml-4 flex items-center lg:ml-6">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-700 mr-4">
                                {{ auth()->user()->username }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ auth()->user()->isAdmin() ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                {{ auth()->user()->isAdmin() ? 'Admin' : 'Pengelola Keuangan' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        @if(session('success'))
                            <div class="mb-4 bg-green-50 border-l-4 border-green-400 p-4 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700">Terjadi kesalahan:</p>
                                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
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
