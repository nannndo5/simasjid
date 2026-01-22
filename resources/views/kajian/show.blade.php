@php
use App\Models\KajianMasjid;
use Illuminate\Support\Facades\Storage;

// Get kajian by ID from slug
$kajianData = KajianMasjid::findOrFail($slug);
$kajian = [
    'judul_kajian' => $kajianData->judul,
    'penceramah' => $kajianData->penceramah ?? '-',
    'tanggal' => $kajianData->tanggal ? $kajianData->tanggal->format('d M Y') : '-',
    'waktu' => $kajianData->waktu ? substr($kajianData->waktu, 0, 5) . ' WIB' : '-',
    'topik' => $kajianData->topik ?? $kajianData->judul,
    'deskripsi' => $kajianData->deskripsi ?? 'Tidak ada deskripsi untuk kajian ini.',
    'image' => $kajianData->gambar ? Storage::url($kajianData->gambar) : asset('picture/masjid.jpg'),
];
$title = $kajian['judul_kajian'] ?? 'Detail Kajian';
$description = $kajian['deskripsi'] ?? 'Detail kajian Islamic Center';

// Get related kajians (excluding current one)
$relatedKajians = KajianMasjid::where('id', '!=', $slug)->orderBy('tanggal', 'desc')->take(3)->get();
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Image -->
    <section class="relative h-96 overflow-hidden">
        <img 
            src="{{ $kajian['image'] }}" 
            alt="{{ $kajian['judul_kajian'] }}"
            class="w-full h-full object-cover"
            srcset="{{ $kajian['image'] }} 1200w"
            sizes="100vw"
            loading="eager"
        >
        <div class="absolute inset-0 bg-navy-900 bg-opacity-70"></div>
        <!-- Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="{{ route('kajian.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ $kajian['judul_kajian'] }}
                </h1>
                <div class="flex items-center justify-center space-x-4 text-lg flex-wrap gap-2">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $kajian['tanggal'] }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $kajian['waktu'] }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <article class="prose prose-lg max-w-none">
                    <div class="text-navy-600 text-lg leading-relaxed mb-8 whitespace-pre-line">
                        <p>{{ $kajian['deskripsi'] }}</p>
                    </div>
                </article>

                <!-- Kajian Details -->
                <div class="bg-navy-50 rounded-lg p-6 mt-8">
                    <h2 class="font-heading text-2xl font-semibold text-navy-900 mb-4">Detail Kajian</h2>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Tanggal</dt>
                            <dd class="text-navy-900 font-semibold">{{ $kajian['tanggal'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Waktu</dt>
                            <dd class="text-navy-900 font-semibold">{{ $kajian['waktu'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Penceramah</dt>
                            <dd class="text-navy-900 font-semibold">{{ $kajian['penceramah'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-navy-600">Topik</dt>
                            <dd class="text-navy-900 font-semibold">{{ $kajian['topik'] }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Kajian -->
    @if($relatedKajians->isNotEmpty())
    <section class="py-12 bg-navy-50" aria-labelledby="related-kajian-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="related-kajian-heading" class="font-heading text-3xl font-bold text-navy-900 mb-8 text-center">
                Kajian Lainnya
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedKajians as $related)
                    <x-kajian-card :kajian="[
                        'judul_kajian' => $related->judul,
                        'penceramah' => $related->penceramah,
                        'tanggal' => $related->tanggal ? $related->tanggal->format('d M Y') : null,
                        'waktu' => $related->waktu ? substr($related->waktu, 0, 5) . ' WIB' : null,
                        'image' => $related->gambar ? Storage::url($related->gambar) : asset('picture/masjid.jpg'),
                        'slug' => $related->id
                    ]" />
                @endforeach
            </div>
        </div>
    </section>
    @endif
</x-layouts.public>
