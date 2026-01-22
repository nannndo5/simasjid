<div x-data x-on:search-updated.window="$wire.updateSearch($event.detail.search)">
    @if($search)
        <div class="mb-6">
            <p class="text-navy-600">
                Menampilkan hasil pencarian untuk: <span class="font-semibold text-navy-900">{{ $search }}</span>
            </p>
        </div>
    @endif

    @if(empty($alqurans))
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-navy-900">Tidak ada AL-Quran ditemukan</h3>
            <p class="mt-1 text-sm text-navy-500">Coba ubah kata kunci pencarian Anda.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($alqurans as $alquran)
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if($alquran['image'])
                        <a href="{{ $alquran['url'] }}">
                            <div class="relative h-48 overflow-hidden">
                                <img 
                                    src="{{ $alquran['image'] }}" 
                                    alt="{{ $alquran['title'] ?? 'AL-Quran' }}"
                                    class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                    loading="lazy"
                                >
                            </div>
                        </a>
                    @endif
                    <div class="p-6">
                        @if($alquran['title'])
                            <h3 class="text-xl font-semibold text-navy-900 mb-2">
                                <a href="{{ $alquran['url'] }}" class="hover:text-green-600 transition-colors">
                                    {{ $alquran['title'] }}
                                </a>
                            </h3>
                        @endif
                        @if(isset($alquran['excerpt']) && $alquran['excerpt'])
                            <p class="text-navy-600 mb-4 line-clamp-3">
                                {{ Str::limit($alquran['excerpt'], 120) }}
                            </p>
                        @endif
                        <a href="{{ $alquran['url'] }}" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                            Baca Selengkapnya
                            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</div>
