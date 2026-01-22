@php
use Illuminate\Support\Facades\Storage;

$title = $alquran->judul ?? 'Detail AL-Quran';
$description = $alquran->excerpt ?? 'Detail AL-Quran Islamic Center';
$alquranImage = $alquran->gambar ? Storage::url($alquran->gambar) : asset('picture/masjid.jpg');
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Image -->
    @if($alquran->gambar)
        <section class="relative h-96 overflow-hidden">
            <img 
                src="{{ $alquranImage }}" 
                alt="{{ $alquran->judul ?? 'AL-Quran' }}"
                class="w-full h-full object-cover"
                srcset="{{ $alquranImage }} 1200w"
                sizes="100vw"
                loading="eager"
            >
            <div class="absolute inset-0 bg-navy-900 bg-opacity-70"></div>
            <!-- Back Button -->
            <div class="absolute top-4 left-4 z-10">
                <a href="{{ route('alquran.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white text-center px-4">
                    {{ $alquran->judul ?? 'AL-Quran' }}
                </h1>
            </div>
        </section>
    @endif
    
    <!-- Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                @if(!$alquran->gambar && $alquran->judul)
                    <div class="mb-6">
                        <!-- Back Button -->
                        <div class="mb-4">
                            <a href="{{ route('alquran.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold text-navy-900">{{ $alquran->judul }}</h1>
                    </div>
                @endif
                
                <article class="prose prose-lg max-w-none">
                    @if($alquran->deskripsi)
                        <div class="text-navy-600 text-lg leading-relaxed whitespace-pre-line">
                            {{ $alquran->deskripsi }}
                        </div>
                    @endif
                </article>
            </div>
        </div>
    </section>
</x-layouts.public>
