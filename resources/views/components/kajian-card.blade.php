@props(['kajian'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="relative h-48 overflow-hidden">
        <img 
            src="{{ $kajian['image'] ?? asset('picture/masjid.jpg') }}" 
            alt="{{ $kajian['judul_kajian'] ?? 'Kajian image' }}"
            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
            srcset="{{ $kajian['image'] ?? asset('picture/masjid.jpg') }} 420w"
            sizes="(max-width: 640px) 100vw, 420px"
            loading="lazy"
        >
        <div class="absolute top-4 left-4">
            <span class="bg-green-600 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-md">
                {{ $kajian['tanggal'] ?? 'Tanggal' }}
            </span>
        </div>
    </div>
    
    <div class="p-6">
        <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2 line-clamp-2 min-h-[3.5rem]">
            {{ $kajian['judul_kajian'] ?? 'Judul Kajian' }}
        </h3>
        <div class="space-y-2 mb-4">
            <p class="text-navy-600 text-sm">
                <span class="font-semibold">Penceramah:</span> 
                <span>{{ $kajian['penceramah'] ?? 'Ust. Ahmad Hidayat' }}</span>
            </p>
            @if(isset($kajian['waktu']))
                <p class="text-navy-600 text-sm">
                    <span class="font-semibold">Waktu:</span> 
                    <span>{{ $kajian['waktu'] }}</span>
                </p>
            @endif
        </div>
        <div class="flex items-center justify-between pt-2 border-t border-navy-100">
            <span class="text-navy-500 text-xs flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $kajian['waktu'] ?? 'Waktu' }}
            </span>
            <a 
                href="{{ isset($kajian['slug']) ? route('kajian.show', $kajian['slug']) : ($kajian['url'] ?? '#') }}" 
                class="text-green-600 hover:text-green-700 font-medium text-sm flex items-center transition-colors"
                aria-label="Lihat detail kajian {{ $kajian['judul_kajian'] ?? 'kajian' }}"
            >
                Lihat Detail
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
