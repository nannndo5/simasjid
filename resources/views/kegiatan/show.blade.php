@php
use App\Models\KegiatanMasjid;
use Illuminate\Support\Facades\Storage;

// Extract ID from slug (format: judul-slug-{id})
$slugParts = explode('-', $slug);
$id = end($slugParts);

$kegiatan = KegiatanMasjid::find($id);

if (!$kegiatan) {
    abort(404, 'Kegiatan tidak ditemukan');
}

$event = [
    'title' => $kegiatan->judul,
    'excerpt' => $kegiatan->deskripsi ?? 'Tidak ada deskripsi',
    'content' => $kegiatan->deskripsi ?? 'Detail kegiatan tidak tersedia.',
    'date' => $kegiatan->tanggal?->format('d M Y') ?? '-',
    'time' => $kegiatan->waktu ? substr($kegiatan->waktu, 0, 5) . ' WIB' : '-',
    'location' => $kegiatan->lokasi ?? '-',
    'image' => $kegiatan->gambar ? Storage::url($kegiatan->gambar) : asset('picture/masjid.jpg'),
    'slug' => $kegiatan->slug,
];
$title = $event['title'] ?? 'Detail Kegiatan';
$description = $event['excerpt'] ?? 'Detail kegiatan Islamic Center';
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Image -->
    <section class="relative h-96 overflow-hidden">
        <img 
            src="{{ $event['image'] }}" 
            alt="{{ $event['title'] }}"
            class="w-full h-full object-cover"
            srcset="{{ $event['image'] }} 1200w"
            sizes="100vw"
            loading="eager"
        >
        <div class="absolute inset-0 bg-navy-900 bg-opacity-70"></div>
        <!-- Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="{{ route('kegiatan.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ $event['title'] }}
                </h1>
                <div class="flex items-center justify-center space-x-4 text-lg flex-wrap gap-2">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $event['date'] }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $event['time'] }}
                    </span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <article class="prose prose-lg max-w-none">
                    <div class="text-navy-600 text-lg leading-relaxed mb-8">
                        <p>{{ $event['content'] }}</p>
                    </div>
                </article>
                
                <!-- Event Details -->
                <div class="bg-navy-50 rounded-lg p-6 mt-8">
                    <h2 class="font-heading text-2xl font-semibold text-navy-900 mb-4">Detail Kegiatan</h2>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Tanggal</dt>
                            <dd class="text-navy-900 font-semibold">{{ $event['date'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Waktu</dt>
                            <dd class="text-navy-900 font-semibold">{{ $event['time'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Lokasi</dt>
                            <dd class="text-navy-900 font-semibold">{{ $event['location'] }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Events -->
    @php
        $relatedEvents = KegiatanMasjid::where('id', '!=', $kegiatan->id)
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();
    @endphp
    
    @if($relatedEvents->count() > 0)
    <section class="py-12 bg-navy-50" aria-labelledby="related-events-heading">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="related-events-heading" class="font-heading text-3xl font-bold text-navy-900 mb-8 text-center">
                Kegiatan Lainnya
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedEvents as $relatedEvent)
                    <x-event-card :event="[
                        'title' => $relatedEvent->judul,
                        'excerpt' => $relatedEvent->deskripsi ?? 'Tidak ada deskripsi',
                        'date' => $relatedEvent->tanggal?->format('d M Y') ?? '-',
                        'time' => $relatedEvent->waktu ? substr($relatedEvent->waktu, 0, 5) . ' WIB' : '-',
                        'image' => $relatedEvent->gambar ? Storage::url($relatedEvent->gambar) : asset('picture/masjid.jpg'),
                        'slug' => $relatedEvent->slug,
                        'url' => route('kegiatan.show', $relatedEvent->slug)
                    ]" />
                @endforeach
            </div>
        </div>
    </section>
    @endif
</x-layouts.public>

