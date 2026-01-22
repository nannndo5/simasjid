@php
use Illuminate\Support\Facades\Storage;

$title = $artikel->judul ?? 'Detail Artikel';
$description = $artikel->excerpt ?? 'Detail artikel Islamic Center';
$articleImage = $artikel->gambar ? Storage::url($artikel->gambar) : asset('picture/masjid.jpg');
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Hero Image -->
    <section class="relative h-96 overflow-hidden">
        <img 
            src="{{ $articleImage }}" 
            alt="{{ $artikel->judul }}"
            class="w-full h-full object-cover"
            srcset="{{ $articleImage }} 1200w"
            sizes="100vw"
            loading="eager"
        >
        <div class="absolute inset-0 bg-navy-900 bg-opacity-70"></div>
        <!-- Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="{{ route('artikel.index') }}" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white px-4 max-w-4xl">
                <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">
                    {{ $artikel->judul }}
                </h1>
                <div class="flex items-center justify-center space-x-4 text-lg flex-wrap gap-2">
                    <span>{{ $artikel->tanggal->format('d M Y') }}</span>
                    <span>•</span>
                    <span>{{ $artikel->penulis ?? 'Admin' }}</span>
                    @if($artikel->kategori)
                        <span>•</span>
                        <span class="bg-green-600 px-3 py-1 rounded-full text-sm">
                            {{ $artikel->kategori }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
    <!-- Content -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <article class="prose prose-lg max-w-none">
                    <div class="text-navy-600 text-lg leading-relaxed whitespace-pre-line">
                        {{ $artikel->deskripsi }}
                    </div>
                </article>
                
                <!-- Article Meta -->
                <div class="border-t border-navy-200 mt-8 pt-8">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center space-x-4">
                            <div>
                                <p class="text-sm text-navy-600">Ditulis oleh</p>
                                <p class="font-semibold text-navy-900">{{ $artikel->penulis ?? 'Admin' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-navy-600">Bagikan:</span>
                            <div class="flex space-x-2">
                                <a href="#" class="text-navy-600 hover:text-gold-600 transition-colors" aria-label="Bagikan di Facebook" rel="noopener noreferrer">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-navy-600 hover:text-gold-600 transition-colors" aria-label="Bagikan di Twitter" rel="noopener noreferrer">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Articles -->
    @php
        $relatedArticles = \App\Models\ArtikelMasjid::where('id', '!=', $artikel->id)
            ->when($artikel->kategori, function ($query) use ($artikel) {
                return $query->where('kategori', $artikel->kategori);
            })
            ->orderBy('tanggal', 'desc')
            ->limit(3)
            ->get();
        
        // If not enough related articles in same category, get more from other categories
        if ($relatedArticles->count() < 3) {
            $additionalArticles = \App\Models\ArtikelMasjid::where('id', '!=', $artikel->id)
                ->whereNotIn('id', $relatedArticles->pluck('id'))
                ->orderBy('tanggal', 'desc')
                ->limit(3 - $relatedArticles->count())
                ->get();
            $relatedArticles = $relatedArticles->concat($additionalArticles);
        }
    @endphp
    
    @if($relatedArticles->count() > 0)
        <section class="py-12 bg-navy-50" aria-labelledby="related-articles-heading">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 id="related-articles-heading" class="font-heading text-3xl font-bold text-navy-900 mb-8 text-center">
                    Artikel Terkait
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedArticles as $related)
                        <x-article-card :article="[
                            'title' => $related->judul,
                            'excerpt' => $related->excerpt,
                            'date' => $related->tanggal->format('d M Y'),
                            'author' => $related->penulis ?? 'Admin',
                            'category' => $related->kategori ?? 'Umum',
                            'image' => $related->gambar ? Storage::url($related->gambar) : asset('picture/masjid.jpg'),
                            'slug' => $related->slug,
                            'url' => route('artikel.show', $related->slug)
                        ]" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>

