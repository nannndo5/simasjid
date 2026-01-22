@php
use Illuminate\Support\Facades\Storage;

$title = 'Konten';
$description = 'Galeri foto dan konten multimedia dari Islamic Center';
$kontens = \App\Models\KontenMasjid::orderBy('tanggal', 'desc')->get();
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Konten</h1>
            <p class="text-xl text-green-100 max-w-2xl">
                Tonton dan Dengarkan berbagai konten islam yang bermanfaat
            </p>
        </div>
    </section>
    
    <!-- Gallery -->
    <section class="py-12 bg-white" aria-labelledby="gallery-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="gallery-heading" class="sr-only">Galeri Konten</h2>
            
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($kontens as $konten)
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
        </div>
    </section>
</x-layouts.public>
