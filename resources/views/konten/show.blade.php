@php
use Illuminate\Support\Facades\Storage;

// Fetch konten from database
$kontenData = \App\Models\KontenMasjid::find($slug);

if (!$kontenData) {
    abort(404);
}

$title = $kontenData->judul;
$description = $kontenData->deskripsi ?? 'Detail konten Islamic Center';

// Fetch related content (excluding current)
$relatedKontens = \App\Models\KontenMasjid::where('id', '!=', $kontenData->id)
    ->orderBy('tanggal', 'desc')
    ->limit(3)
    ->get();
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Image -->
    <section class="relative h-96 overflow-hidden">
        @if($kontenData->gambar)
            <img 
                src="{{ Storage::url($kontenData->gambar) }}" 
                alt="{{ $kontenData->judul }}"
                class="w-full h-full object-cover"
                loading="eager"
            >
        @else
            <img 
                src="{{ asset('picture/masjid.jpg') }}" 
                alt="{{ $kontenData->judul }}"
                class="w-full h-full object-cover"
                loading="eager"
            >
        @endif
        <div class="absolute inset-0 bg-navy-900 bg-opacity-70"></div>
        <!-- Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="{{ route('konten.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ $kontenData->judul }}
                </h1>
                <div class="flex items-center justify-center space-x-4 text-lg flex-wrap gap-2">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        @if($kontenData->tanggal)
                            {{ $kontenData->tanggal->format('d M Y') }}
                        @else
                            {{ $kontenData->created_at->format('d M Y') }}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                @if($kontenData->deskripsi)
                    <article class="prose prose-lg max-w-none">
                        <div class="text-navy-600 text-lg leading-relaxed mb-8 whitespace-pre-line">
                            {{ $kontenData->deskripsi }}
                        </div>
                    </article>
                @endif

                <!-- Video Link -->
                @if($kontenData->link)
                    <div class="bg-green-50 rounded-lg p-6 mt-8 border border-green-200">
                        <h2 class="font-heading text-2xl font-semibold text-navy-900 mb-4">Tonton Video</h2>
                        <p class="text-navy-600 mb-4">
                            Saksikan video lengkap tentang konten ini melalui platform berikut:
                        </p>
                        <a 
                            href="{{ $kontenData->link }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg"
                            aria-label="Tonton video"
                        >
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            Tonton Video
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Related Content -->
    @if($relatedKontens->isNotEmpty())
        <section class="py-12 bg-navy-50" aria-labelledby="related-content-heading">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 id="related-content-heading" class="font-heading text-3xl font-bold text-navy-900 mb-8 text-center">
                    Konten Lainnya
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedKontens as $relatedKonten)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div class="relative h-48 bg-navy-900 overflow-hidden">
                                @if($relatedKonten->gambar)
                                    <img 
                                        src="{{ Storage::url($relatedKonten->gambar) }}" 
                                        alt="{{ $relatedKonten->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                                        loading="lazy"
                                    >
                                @else
                                    <img 
                                        src="{{ asset('picture/masjid.jpg') }}" 
                                        alt="{{ $relatedKonten->judul }}"
                                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                                        loading="lazy"
                                    >
                                @endif
                                @if($relatedKonten->link)
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
                                    {{ $relatedKonten->judul }}
                                </h3>
                                <p class="text-navy-600 text-sm mb-4 line-clamp-2">
                                    {{ Str::limit($relatedKonten->deskripsi, 100) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-navy-500 text-xs">
                                        @if($relatedKonten->tanggal)
                                            {{ $relatedKonten->tanggal->format('d M Y') }}
                                        @else
                                            {{ $relatedKonten->created_at->format('d M Y') }}
                                        @endif
                                    </span>
                                    <a 
                                        href="{{ route('konten.show', $relatedKonten->id) }}" 
                                        class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center transition-colors"
                                        aria-label="Lihat detail {{ $relatedKonten->judul }}"
                                    >
                                        Lihat Detail
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
