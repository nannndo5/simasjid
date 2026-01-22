@php
use App\Models\KajianMasjid;
use App\Models\KontenMasjid;
use Illuminate\Support\Facades\Storage;

$title = 'Beranda';
$description = 'Selamat datang di website resmi Islamic Center - Beranda, Kegiatan, Artikel, Kajian, Konten, dan Infaq';
$latestKajians = KajianMasjid::orderBy('tanggal', 'desc')->take(3)->get();
$latestKontens = KontenMasjid::orderBy('tanggal', 'desc')->take(3)->get();
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Section -->
    <x-hero 
        title="Selamat Datang di Islamic Center"
        subtitle="Menjadi pusat kegiatan dan kajian Islam yang bermanfaat bagi umat"
        :image="asset('picture/masjid.jpg')"
        imageAlt="Masjid Islamic Center"
        :images="[
            asset('picture/masjid.jpg'),
            asset('picture/masjid2.jpg'),
            asset('picture/masjid3.jpg'),
            asset('picture/masjid4.jpg'),
            asset('picture/masjid5.jpg')
        ]"
    />
    
    <!-- Latest Events Section -->
    <section class="py-12 md:py-16 bg-navy-50" aria-labelledby="events-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="events-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-4">
                    Kegiatan Terbaru
                </h2>
                <p class="text-navy-600 max-w-2xl mx-auto">
                    Ikuti berbagai kegiatan dan acara yang diselenggarakan oleh Islamic Center
                </p>
            </div>
            
            @livewire('events-list', ['limit' => 3])
            
            <div class="text-center mt-10">
                <a 
                    href="{{ route('kegiatan.index') }}" 
                    class="inline-flex items-center bg-gold-500 hover:bg-gold-600 text-navy-900 px-6 py-3 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg"
                    aria-label="Lihat semua kegiatan"
                >
                    Lihat Semua Kegiatan
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Featured Article Section -->
    <section class="py-12 md:py-16 bg-white" aria-labelledby="article-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="article-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-4">
                    Artikel Terbaru
                </h2>
                <p class="text-navy-600 max-w-2xl mx-auto">
                    Baca artikel dan tulisan bermanfaat tentang Islam dan kehidupan sehari-hari
                </p>
            </div>
            
            @livewire('articles-list', ['limit' => 3])
            
            <div class="text-center mt-10">
                <a 
                    href="{{ route('artikel.index') }}" 
                    class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg"
                    aria-label="Lihat semua artikel"
                >
                    Lihat Semua Artikel
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Kajian Highlight Section -->
    <section class="py-12 md:py-16 bg-gradient-to-br from-green-50 to-navy-50" aria-labelledby="kajian-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="kajian-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-4">
                    Kajian Islam
                </h2>
                <p class="text-navy-600 max-w-2xl mx-auto">
                    Jadwal Kajian yang diselenggarakan di Masjid Islamic Center
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($latestKajians as $kajian)
                    <x-kajian-card :kajian="[
                        'judul_kajian' => $kajian->judul,
                        'penceramah' => $kajian->penceramah,
                        'tanggal' => $kajian->tanggal ? $kajian->tanggal->format('d M Y') : null,
                        'waktu' => $kajian->waktu ? substr($kajian->waktu, 0, 5) . ' WIB' : null,
                        'image' => $kajian->gambar ? Storage::url($kajian->gambar) : asset('picture/masjid.jpg'),
                        'slug' => $kajian->id
                    ]" />
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">Belum ada kajian yang tersedia</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-10">
                <a 
                    href="{{ route('kajian.index') }}" 
                    class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg"
                    aria-label="Lihat semua kajian"
                >
                    Lihat Semua Kajian
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Media/Gallery Preview Section -->
    <section class="py-12 md:py-16 bg-white" aria-labelledby="gallery-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 id="gallery-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-4">
                    Konten
                </h2>
                <p class="text-navy-600 max-w-2xl mx-auto">
                    Jelajahi berbagai konten islam yang bermanfaat
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($latestKontens as $konten)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="relative h-48 bg-navy-900 overflow-hidden">
                            @if($konten->gambar)
                                <img 
                                    src="{{ Storage::url($konten->gambar) }}" 
                                    alt="{{ $konten->judul }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                                    loading="lazy"
                                >
                            @else
                                <img 
                                    src="{{ asset('picture/masjid.jpg') }}" 
                                    alt="{{ $konten->judul }}"
                                    class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                                    loading="lazy"
                                >
                            @endif
                            @if($konten->link)
                                <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30">
                                    <svg class="w-16 h-16 text-gold-500 opacity-80" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                                <div class="absolute top-4 right-4">
                                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        Video
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2 line-clamp-2">
                                {{ $konten->judul }}
                            </h3>
                            <p class="text-navy-600 text-sm mb-4 line-clamp-2">
                                {{ Str::limit($konten->deskripsi, 100) }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-navy-500 text-xs">
                                    @if($konten->tanggal)
                                        {{ $konten->tanggal->format('d M Y') }}
                                    @else
                                        {{ $konten->created_at->format('d M Y') }}
                                    @endif
                                </span>
                                <a 
                                    href="{{ route('konten.show', $konten->id) }}" 
                                    class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center transition-colors"
                                    aria-label="Lihat detail {{ $konten->judul }}"
                                >
                                    Lihat Detail
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 font-medium">Belum ada konten masjid</p>
                        <p class="text-gray-400 text-sm mt-1">Konten akan segera hadir</p>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-10">
                <a 
                    href="{{ route('konten.index') }}" 
                    class="inline-flex items-center text-navy-700 hover:text-navy-900 font-semibold"
                    aria-label="Lihat semua konten"
                >
                    Lihat Semua Konten
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    
    <!-- Donation/Infaq CTA Section -->
    <section class="py-12 md:py-16 bg-gradient-to-r from-green-600 to-green-700" aria-labelledby="donation-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 id="donation-heading" class="font-heading text-3xl md:text-4xl font-bold mb-4">
                    Berikan Infaq untuk Kebaikan
                </h2>
                <p class="text-xl mb-8 text-green-100">
                    Infaq dan donasi Anda sangat berarti untuk kelangsungan kegiatan dan program Islamic Center
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a 
                        href="{{ route('infaq') }}" 
                        class="inline-flex items-center justify-center bg-gold-500 hover:bg-gold-600 text-navy-900 px-8 py-4 rounded-lg font-semibold text-lg transition-colors shadow-lg hover:shadow-xl"
                        aria-label="Berikan infaq sekarang"
                    >
                        Berikan Infaq Sekarang
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    
                </div>
            </div>
        </div>
    </section>
    
    <!-- Jadwal Shalat Section -->
    <section class="py-12 md:py-16 bg-navy-900 text-white" aria-labelledby="prayer-times-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-8">
                    <h2 id="prayer-times-heading" class="font-heading text-3xl md:text-4xl font-bold mb-4">
                        Jadwal Shalat
                    </h2>
                    <p class="text-navy-300 text-lg">
                        <span id="prayer-date" class="font-semibold text-gold-300"></span>
                    </p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 md:gap-6">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-3xl mb-3">🌅</div>
                        <h3 class="font-semibold text-gold-300 mb-2 text-sm md:text-base">Subuh</h3>
                        <p id="prayer-subuh" class="text-2xl md:text-3xl font-bold">04:59</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-3xl mb-3">☀️</div>
                        <h3 class="font-semibold text-gold-300 mb-2 text-sm md:text-base">Dzuhur</h3>
                        <p id="prayer-dzuhur" class="text-2xl md:text-3xl font-bold">12:25</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-3xl mb-3">🌤️</div>
                        <h3 class="font-semibold text-gold-300 mb-2 text-sm md:text-base">Ashar</h3>
                        <p id="prayer-ashar" class="text-2xl md:text-3xl font-bold">15:49</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-3xl mb-3">🌆</div>
                        <h3 class="font-semibold text-gold-300 mb-2 text-sm md:text-base">Maghrib</h3>
                        <p id="prayer-maghrib" class="text-2xl md:text-3xl font-bold">18:28</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
                        <div class="text-3xl mb-3">🌙</div>
                        <h3 class="font-semibold text-gold-300 mb-2 text-sm md:text-base">Isya</h3>
                        <p id="prayer-isya" class="text-2xl md:text-3xl font-bold">19:42</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
