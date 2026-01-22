@props(['event'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="relative h-48 overflow-hidden">
        <img 
            src="{{ $event['image'] ?? asset('picture/masjid.jpg') }}" 
            alt="{{ $event['title'] ?? 'Event image' }}"
            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
            srcset="{{ $event['image'] ?? asset('picture/masjid.jpg') }} 420w"
            sizes="(max-width: 640px) 100vw, 420px"
            loading="lazy"
        >
        <div class="absolute top-4 left-4">
            <span class="bg-gold-500 text-navy-900 px-3 py-1.5 rounded-full text-xs font-semibold shadow-md">
                {{ $event['date'] ?? 'Tanggal' }}
            </span>
        </div>
    </div>
    
    <div class="p-6">
        <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2 line-clamp-2 min-h-[3.5rem]">
            {{ $event['title'] ?? 'Judul Kegiatan' }}
        </h3>
        <p class="text-navy-600 text-sm mb-4 line-clamp-3 min-h-[4.5rem]">
            {{ $event['excerpt'] ?? 'Deskripsi singkat kegiatan...' }}
        </p>
        <div class="flex items-center justify-between pt-2 border-t border-navy-100">
            <span class="text-navy-500 text-xs flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $event['time'] ?? 'Waktu' }}
            </span>
            <a 
                href="{{ isset($event['slug']) ? route('kegiatan.show', $event['slug']) : ($event['url'] ?? '#') }}" 
                class="text-gold-600 hover:text-gold-700 font-medium text-sm flex items-center transition-colors"
                aria-label="Baca selengkapnya tentang {{ $event['title'] ?? 'kegiatan' }}"
            >
                Baca Selengkapnya
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
