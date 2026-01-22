@php
use Illuminate\Support\Facades\Storage;

$title = $kitab->judul ?? 'Detail Kitab';
$description = $kitab->excerpt ?? 'Detail kitab Islamic Center';
$kitabImage = $kitab->gambar ? Storage::url($kitab->gambar) : asset('picture/masjid.jpg');
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Image -->
    @if($kitab->gambar)
        <section class="relative h-96 overflow-hidden">
            <img 
                src="{{ $kitabImage }}" 
                alt="{{ $kitab->judul ?? 'Kitab' }}"
                class="w-full h-full object-cover"
                srcset="{{ $kitabImage }} 1200w"
                sizes="100vw"
                loading="eager"
            >
            <div class="absolute inset-0 bg-navy-900 bg-opacity-70"></div>
            <!-- Back Button -->
            <div class="absolute top-4 left-4 z-10">
                <a href="{{ route('kitab.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white text-center px-4">
                    {{ $kitab->judul ?? 'Kitab' }}
                </h1>
            </div>
        </section>
    @endif
    
    <!-- Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                @if(!$kitab->gambar && $kitab->judul)
                    <div class="mb-6">
                        <!-- Back Button -->
                        <div class="mb-4">
                            <a href="{{ route('kitab.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold text-navy-900">{{ $kitab->judul }}</h1>
                    </div>
                @endif
                
                <article class="prose prose-lg max-w-none">
                    @if($kitab->deskripsi)
                        <div class="text-navy-600 text-lg leading-relaxed whitespace-pre-line">
                            {{ $kitab->deskripsi }}
                        </div>
                    @endif
                </article>
            </div>
        </div>
    </section>
</x-layouts.public>
