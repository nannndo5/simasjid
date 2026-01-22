@props(['article'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="relative h-48 overflow-hidden">
        <img 
            src="{{ $article['image'] ?? asset('picture/masjid.jpg') }}" 
            alt="{{ $article['title'] ?? 'Article image' }}"
            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
            srcset="{{ $article['image'] ?? asset('picture/masjid.jpg') }} 600w"
            sizes="(max-width: 640px) 100vw, 600px"
            loading="lazy"
        >
        <div class="absolute top-4 left-4">
            <span class="bg-green-600 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-md">
                {{ $article['category'] ?? 'Artikel' }}
            </span>
        </div>
    </div>
    
    <div class="p-6">
        <div class="flex items-center text-xs text-navy-500 mb-2">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>{{ $article['date'] ?? 'Tanggal' }}</span>
            <span class="mx-2">•</span>
            <span>{{ $article['author'] ?? 'Penulis' }}</span>
        </div>
        <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2 line-clamp-2 min-h-[3.5rem]">
            {{ $article['title'] ?? 'Judul Artikel' }}
        </h3>
        <p class="text-navy-600 text-sm mb-4 line-clamp-3 min-h-[4.5rem]">
            {{ $article['excerpt'] ?? 'Deskripsi singkat artikel...' }}
        </p>
        <a 
            href="{{ isset($article['slug']) ? route('artikel.show', $article['slug']) : ($article['url'] ?? '#') }}" 
            class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center transition-colors"
            aria-label="Baca selengkapnya tentang {{ $article['title'] ?? 'artikel' }}"
        >
            Baca Selengkapnya
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>
