@php
use Illuminate\Support\Facades\Storage;
$title = 'Infaq';
$description = 'Berikan infaq dan donasi untuk mendukung kegiatan Islamic Center';

// Helper function untuk membuat URL pagination
function getPaginationUrl($currentParams, $type, $page) {
    $params = $currentParams;
    $params[$type . '_page'] = $page;
    return route('infaq') . '?' . http_build_query($params);
}

// Get current query parameters
$currentParams = request()->query();
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Infaq & Donasi</h1>
            <p class="text-xl text-green-100 max-w-2xl">
                Berikan infaq dan donasi Anda untuk mendukung kegiatan dan program Islamic Center
            </p>
        </div>
    </section>
    
    <!-- Informasi Rekening Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Informasi Rekening -->
                    <div>
                        <div class="bg-navy-50 rounded-lg p-6">
                            <h2 class="font-heading text-2xl font-semibold text-navy-900 mb-4">
                                Informasi Rekening
                            </h2>
                            @if($informasiRekening)
                                <div class="space-y-4 text-sm">
                                    @if($informasiRekening->nama_bank_1)
                                        <div>
                                            <p class="text-navy-600 font-medium mb-1">Bank {{ $informasiRekening->nama_bank_1 }}</p>
                                            <p class="text-navy-900 font-semibold">{{ $informasiRekening->no_rekening_1 }}</p>
                                            <p class="text-navy-600">a.n. Islamic Center</p>
                                        </div>
                                    @endif
                                    @if($informasiRekening->nama_bank_2)
                                        <div>
                                            <p class="text-navy-600 font-medium mb-1">Bank {{ $informasiRekening->nama_bank_2 }}</p>
                                            <p class="text-navy-900 font-semibold">{{ $informasiRekening->no_rekening_2 }}</p>
                                            <p class="text-navy-600">a.n. Islamic Center</p>
                                        </div>
                                    @endif
                                    @if($informasiRekening->nama_bank_3)
                                        <div>
                                            <p class="text-navy-600 font-medium mb-1">Bank {{ $informasiRekening->nama_bank_3 }}</p>
                                            <p class="text-navy-900 font-semibold">{{ $informasiRekening->no_rekening_3 }}</p>
                                            <p class="text-navy-600">a.n. Islamic Center</p>
                                        </div>
                                    @endif
                                    @if($informasiRekening->no_whatsapp)
                                        <div class="pt-4 border-t border-navy-200">
                                            <p class="text-navy-600 font-medium mb-1">WhatsApp</p>
                                            <p class="text-navy-900 font-semibold">{{ $informasiRekening->no_whatsapp }}</p>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="space-y-4 text-sm">
                                    <p class="text-navy-600">Informasi rekening belum tersedia.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Gambar Informasi Rekening -->
                    <div>
                        @if($informasiRekening && $informasiRekening->gambar)
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h2 class="font-heading text-2xl font-semibold text-navy-900 mb-4">
                                    Informasi Transfer
                                </h2>
                                <div class="flex justify-center">
                                    <img src="{{ Storage::url($informasiRekening->gambar) }}" alt="Informasi Rekening" class="max-w-full h-auto rounded-lg border border-navy-200">
                                </div>
                            </div>
                        @else
                            <div class="bg-navy-50 rounded-lg p-6 flex items-center justify-center min-h-[300px]">
                                <p class="text-navy-600 text-center">Gambar informasi rekening belum tersedia.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Financial Reports Carousel Section -->
    <section class="py-12 bg-navy-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="font-heading text-3xl font-bold text-navy-900">
                        Laporan Keuangan
                    </h2>
                    <!-- Dropdown Filter Jenis Transaksi -->
                    <div class="relative">
                        <select id="jenisTransaksiFilter" class="appearance-none bg-green-600 hover:bg-green-700 text-white rounded-lg pl-5 pr-11 py-2.5 min-w-[200px] text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all shadow-lg hover:shadow-xl cursor-pointer">
                            <option value="" class="bg-white text-navy-900">Semua Jenis</option>
                            <option value="infaq" {{ ($selectedJenis ?? '') === 'infaq' ? 'selected' : '' }} class="bg-white text-navy-900">Infaq</option>
                            <option value="donasi" {{ ($selectedJenis ?? '') === 'donasi' ? 'selected' : '' }} class="bg-white text-navy-900">Donasi</option>
                            <option value="sedekah" {{ ($selectedJenis ?? '') === 'sedekah' ? 'selected' : '' }} class="bg-white text-navy-900">Sedekah</option>
                            <option value="pengeluaran" {{ ($selectedJenis ?? '') === 'pengeluaran' ? 'selected' : '' }} class="bg-white text-navy-900">Pengeluaran</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center justify-center pr-4 pointer-events-none w-8">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                
                @if($isFiltered ?? false)
                    <!-- Back Button (shown when filtered) -->
                    <div class="mb-4">
                        <a href="{{ route('infaq') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Semua Laporan
                        </a>
                    </div>
                @endif
                
                <!-- Carousel Container -->
                <div class="relative" id="financialReportsContainer">
                    <div id="financialCarousel" class="overflow-hidden rounded-xl">
                        <div class="flex transition-transform duration-500 ease-in-out" id="carouselTrack">
                            <!-- Card Infaq -->
                            <div class="min-w-full carousel-slide" data-jenis="infaq">
                                <div class="bg-white rounded-xl shadow-lg p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-2xl font-bold text-blue-600">Infaq</h3>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">Total</p>
                                            <p class="text-3xl font-bold text-blue-600">Rp {{ number_format($totalInfaq, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-2 max-h-64 overflow-y-auto">
                                        @forelse($infaqs as $infaq)
                                            <div class="grid grid-cols-3 gap-3 items-center p-3 bg-blue-50 rounded-lg">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($infaq->tanggal)->format('d M Y') }}</p>
                                                    <p class="text-xs text-gray-600">{{ $infaq->keterangan ?? '-' }}</p>
                                                </div>
                                                <div class="flex justify-center">
                                                    @if($infaq->kategori)
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $infaq->kategori === 'uang masuk' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                                                            {{ ucfirst(str_replace(' ', ' ', $infaq->kategori)) }}
                                                        </span>
                                                    @else
                                                        <span class="text-xs text-gray-400">-</span>
                                                    @endif
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-sm font-bold text-blue-600">Rp {{ number_format($infaq->jumlah, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                                        @endforelse
                                    </div>
                                    @if(($totalPagesInfaq ?? 0) > 1)
                                        <div class="mt-4 flex justify-center items-center gap-2 flex-wrap">
                                            @for($i = 1; $i <= $totalPagesInfaq; $i++)
                                                <a href="{{ getPaginationUrl($currentParams, 'infaq', $i) }}" 
                                                   class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ $infaqPage == $i ? 'bg-gold-500 text-navy-900 font-semibold shadow-md' : 'bg-blue-100 text-blue-700 hover:bg-blue-200' }}">
                                                    {{ $i }}
                                                </a>
                                            @endfor
                                        </div>
                                    @endif
                                    <!-- Navigation Buttons -->
                                    <div class="mt-4 flex justify-center items-center gap-4">
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-blue-500 transition-all" data-direction="prev">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-blue-500 transition-all" data-direction="next">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Card Donasi -->
                            <div class="min-w-full carousel-slide" data-jenis="donasi">
                                <div class="bg-white rounded-xl shadow-lg p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-2xl font-bold text-purple-600">Donasi</h3>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">Total</p>
                                            <p class="text-3xl font-bold text-purple-600">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-2 max-h-64 overflow-y-auto">
                                        @forelse($donasis as $donasi)
                                            <div class="grid grid-cols-3 gap-3 items-center p-3 bg-purple-50 rounded-lg">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($donasi->tanggal)->format('d M Y') }}</p>
                                                    <p class="text-xs text-gray-600">{{ $donasi->keterangan ?? '-' }}</p>
                                                </div>
                                                <div class="flex justify-center">
                                                    @if($donasi->kategori)
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $donasi->kategori === 'uang masuk' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                                                            {{ ucfirst(str_replace(' ', ' ', $donasi->kategori)) }}
                                                        </span>
                                                    @else
                                                        <span class="text-xs text-gray-400">-</span>
                                                    @endif
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-sm font-bold text-purple-600">Rp {{ number_format($donasi->jumlah, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                                        @endforelse
                                    </div>
                                    @if(($totalPagesDonasi ?? 0) > 1)
                                        <div class="mt-4 flex justify-center items-center gap-2 flex-wrap">
                                            @for($i = 1; $i <= $totalPagesDonasi; $i++)
                                                <a href="{{ getPaginationUrl($currentParams, 'donasi', $i) }}" 
                                                   class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ $donasiPage == $i ? 'bg-gold-500 text-navy-900 font-semibold shadow-md' : 'bg-purple-100 text-purple-700 hover:bg-purple-200' }}">
                                                    {{ $i }}
                                                </a>
                                            @endfor
                                        </div>
                                    @endif
                                    <!-- Navigation Buttons -->
                                    <div class="mt-4 flex justify-center items-center gap-4">
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-purple-500 transition-all" data-direction="prev">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-purple-500 transition-all" data-direction="next">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Card Sedekah -->
                            <div class="min-w-full carousel-slide" data-jenis="sedekah">
                                <div class="bg-white rounded-xl shadow-lg p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-2xl font-bold text-green-600">Sedekah</h3>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">Total</p>
                                            <p class="text-3xl font-bold text-green-600">Rp {{ number_format($totalSedekah, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-2 max-h-64 overflow-y-auto">
                                        @forelse($sedekahs as $sedekah)
                                            <div class="grid grid-cols-3 gap-3 items-center p-3 bg-green-50 rounded-lg">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($sedekah->tanggal)->format('d M Y') }}</p>
                                                    <p class="text-xs text-gray-600">{{ $sedekah->keterangan ?? '-' }}</p>
                                                </div>
                                                <div class="flex justify-center">
                                                    @if($sedekah->kategori)
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $sedekah->kategori === 'uang masuk' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                                                            {{ ucfirst(str_replace(' ', ' ', $sedekah->kategori)) }}
                                                        </span>
                                                    @else
                                                        <span class="text-xs text-gray-400">-</span>
                                                    @endif
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-sm font-bold text-green-600">Rp {{ number_format($sedekah->jumlah, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                                        @endforelse
                                    </div>
                                    @if(($totalPagesSedekah ?? 0) > 1)
                                        <div class="mt-4 flex justify-center items-center gap-2 flex-wrap">
                                            @for($i = 1; $i <= $totalPagesSedekah; $i++)
                                                <a href="{{ getPaginationUrl($currentParams, 'sedekah', $i) }}" 
                                                   class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ $sedekahPage == $i ? 'bg-gold-500 text-navy-900 font-semibold shadow-md' : 'bg-green-100 text-green-700 hover:bg-green-200' }}">
                                                    {{ $i }}
                                                </a>
                                            @endfor
                                        </div>
                                    @endif
                                    <!-- Navigation Buttons -->
                                    <div class="mt-4 flex justify-center items-center gap-4">
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-green-500 transition-all" data-direction="prev">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-green-500 transition-all" data-direction="next">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Card Pengeluaran -->
                            <div class="min-w-full carousel-slide" data-jenis="pengeluaran">
                                <div class="bg-white rounded-xl shadow-lg p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-2xl font-bold text-red-600">Pengeluaran</h3>
                                        <div class="text-right">
                                            <p class="text-sm text-gray-600">Total</p>
                                            <p class="text-3xl font-bold text-red-600">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="space-y-2 max-h-64 overflow-y-auto">
                                        @forelse($pengeluarans as $pengeluaran)
                                            <div class="grid grid-cols-3 gap-3 items-center p-3 bg-red-50 rounded-lg">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d M Y') }}</p>
                                                    <p class="text-xs text-gray-600">{{ $pengeluaran->keterangan ?? '-' }}</p>
                                                </div>
                                                <div class="flex justify-center">
                                                    @if($pengeluaran->kategori)
                                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $pengeluaran->kategori === 'uang masuk' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                                                            {{ ucfirst(str_replace(' ', ' ', $pengeluaran->kategori)) }}
                                                        </span>
                                                    @else
                                                        <span class="text-xs text-gray-400">-</span>
                                                    @endif
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-sm font-bold text-red-600">Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-gray-500 text-center py-4">Belum ada transaksi</p>
                                        @endforelse
                                    </div>
                                    @if(($totalPagesPengeluaran ?? 0) > 1)
                                        <div class="mt-4 flex justify-center items-center gap-2 flex-wrap">
                                            @for($i = 1; $i <= $totalPagesPengeluaran; $i++)
                                                <a href="{{ getPaginationUrl($currentParams, 'pengeluaran', $i) }}" 
                                                   class="px-3 py-1.5 rounded-md text-sm font-medium transition-colors {{ $pengeluaranPage == $i ? 'bg-gold-500 text-navy-900 font-semibold shadow-md' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
                                                    {{ $i }}
                                                </a>
                                            @endfor
                                        </div>
                                    @endif
                                    <!-- Navigation Buttons -->
                                    <div class="mt-4 flex justify-center items-center gap-4">
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-red-500 transition-all" data-direction="prev">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="carousel-nav-btn bg-white border-2 border-gray-300 rounded-full p-2.5 shadow-md hover:bg-gray-50 hover:border-red-500 transition-all" data-direction="next">
                                            <svg class="w-5 h-5 text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dots Indicator -->
                    @if(!($isFiltered ?? false))
                        <div class="flex justify-center mt-6 gap-2" id="dotsIndicator">
                            <button class="carousel-dot w-3 h-3 rounded-full bg-green-600 transition-all" data-slide="0"></button>
                            <button class="carousel-dot w-3 h-3 rounded-full bg-gray-300 transition-all" data-slide="1"></button>
                            <button class="carousel-dot w-3 h-3 rounded-full bg-gray-300 transition-all" data-slide="2"></button>
                            <button class="carousel-dot w-3 h-3 rounded-full bg-gray-300 transition-all" data-slide="3"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    <!-- Why Donate Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-heading text-3xl font-bold text-navy-900 mb-8 text-center">
                    Mengapa Berinfaq?
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="w-16 h-16 bg-gold-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2">
                            Membantu Umat
                        </h3>
                        <p class="text-navy-600 text-sm">
                            Infaq Anda membantu kegiatan dan program yang bermanfaat bagi umat
                        </p>
                    </div>
                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2">
                            Transparan
                        </h3>
                        <p class="text-navy-600 text-sm">
                            Penggunaan dana infaq dilakukan secara transparan dan akuntabel
                        </p>
                    </div>
                    <div class="bg-white rounded-lg p-6 text-center">
                        <div class="w-16 h-16 bg-navy-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2">
                            Berpahala
                        </h3>
                        <p class="text-navy-600 text-sm">
                            Infaq dan sedekah merupakan amalan yang berpahala besar
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('carouselTrack');
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.carousel-dot');
            const navButtons = document.querySelectorAll('.carousel-nav-btn');
            
            // Check if elements exist
            if (!track || !slides.length || !navButtons.length) {
                console.error('Carousel elements not found');
                return;
            }
            
            let currentSlide = 0;
            let autoSlideInterval;
            let touchStartX = 0;
            let touchEndX = 0;
            
            function updateCarousel() {
                if (!track) return;
                
                // If filtered, always show at 0% since only one slide is visible
                if (isFiltered) {
                    track.style.transform = 'translateX(0%)';
                } else {
                    track.style.transform = `translateX(-${currentSlide * 100}%)`;
                }
                
                dots.forEach((dot, index) => {
                    if (index === currentSlide) {
                        dot.classList.remove('bg-gray-300');
                        dot.classList.add('bg-green-600');
                        dot.classList.add('w-8');
                    } else {
                        dot.classList.remove('bg-green-600');
                        dot.classList.remove('w-8');
                        dot.classList.add('bg-gray-300');
                        dot.classList.add('w-3');
                    }
                });
            }
            
            function getVisibleSlides() {
                return Array.from(slides).filter(slide => slide.style.display !== 'none');
            }
            
            function nextSlide() {
                const visibleSlides = getVisibleSlides();
                if (!visibleSlides.length) return;
                const currentIndex = visibleSlides.indexOf(slides[currentSlide]);
                const nextIndex = (currentIndex + 1) % visibleSlides.length;
                currentSlide = Array.from(slides).indexOf(visibleSlides[nextIndex]);
                updateCarousel();
            }
            
            function prevSlide() {
                const visibleSlides = getVisibleSlides();
                if (!visibleSlides.length) return;
                const currentIndex = visibleSlides.indexOf(slides[currentSlide]);
                const prevIndex = (currentIndex - 1 + visibleSlides.length) % visibleSlides.length;
                currentSlide = Array.from(slides).indexOf(visibleSlides[prevIndex]);
                updateCarousel();
            }
            
            function goToSlide(index) {
                if (!slides.length || index < 0 || index >= slides.length) return;
                if (slides[index].style.display === 'none') return;
                currentSlide = index;
                updateCarousel();
            }
            
            function startAutoSlide() {
                stopAutoSlide();
                autoSlideInterval = setInterval(nextSlide, 5000);
            }
            
            function stopAutoSlide() {
                if (autoSlideInterval) {
                    clearInterval(autoSlideInterval);
                    autoSlideInterval = null;
                }
            }
            
            // Button controls
            navButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const direction = this.getAttribute('data-direction');
                    if (direction === 'next') {
                        nextSlide();
                    } else if (direction === 'prev') {
                        prevSlide();
                    }
                    stopAutoSlide();
                    if (!isFiltered) {
                        startAutoSlide();
                    }
                });
            });
            
            // Dot controls
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    goToSlide(index);
                    stopAutoSlide();
                    if (!isFiltered) {
                        startAutoSlide();
                    }
                });
            });
            
            // Touch swipe
            if (track) {
                track.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoSlide();
                });
                
                track.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                    if (!isFiltered) {
                        startAutoSlide();
                    }
                });
                
                function handleSwipe() {
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;
                    
                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                    }
                }
            }
            
            // Pause on hover
            const carousel = document.getElementById('financialCarousel');
            if (carousel) {
                carousel.addEventListener('mouseenter', stopAutoSlide);
                carousel.addEventListener('mouseleave', function() {
                    if (!isFiltered) {
                        startAutoSlide();
                    }
                });
            }
            
            // Filter dropdown handler
            const jenisFilter = document.getElementById('jenisTransaksiFilter');
            const isFiltered = {{ ($isFiltered ?? false) ? 'true' : 'false' }};
            
            if (jenisFilter) {
                jenisFilter.addEventListener('change', function() {
                    const selectedJenis = this.value;
                    if (selectedJenis) {
                        // Redirect to filtered view
                        window.location.href = '{{ route("infaq") }}?jenis=' + selectedJenis;
                    } else {
                        // Redirect to all view
                        window.location.href = '{{ route("infaq") }}';
                    }
                });
            }
            
            // Filter slides based on selected jenis
            if (isFiltered) {
                const selectedJenis = '{{ $selectedJenis ?? "" }}';
                if (selectedJenis) {
                    // Find and show only the matching slide
                    let foundIndex = -1;
                    slides.forEach((slide, index) => {
                        const slideJenis = slide.getAttribute('data-jenis');
                        if (slideJenis === selectedJenis) {
                            slide.style.display = 'block';
                            slide.style.minWidth = '100%';
                            foundIndex = index;
                        } else {
                            slide.style.display = 'none';
                            slide.style.minWidth = '0%';
                        }
                    });
                    // Go to the matching slide
                    if (foundIndex >= 0) {
                        currentSlide = foundIndex;
                    }
                    // Stop auto-slide when filtered
                    stopAutoSlide();
                    // Hide navigation buttons when filtered
                    navButtons.forEach(btn => {
                        const btnContainer = btn.closest('.mt-4');
                        if (btnContainer) {
                            btnContainer.style.display = 'none';
                        }
                    });
                    // Update carousel to show the filtered slide
                    updateCarousel();
                }
            }
            
            // Initialize
            updateCarousel();
            if (!isFiltered) {
                startAutoSlide();
            }
        });
    </script>
    @endpush
</x-layouts.public>
