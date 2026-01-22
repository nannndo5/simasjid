@php
use App\Models\KajianMasjid;

$title = 'Kajian';
$description = 'Daftar kajian Islam yang dapat ditonton dan didengarkan';
$kajians = KajianMasjid::orderBy('tanggal', 'desc')->get();
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-navy-900 to-navy-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Kajian Islam</h1>
            <p class="text-xl text-navy-200 max-w-2xl">
                Tonton dan dengarkan kajian-kajian Islam yang bermanfaat
            </p>
        </div>
    </section>
    
    <!-- Search Bar -->
    <section class="py-8 bg-navy-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('search-bar', ['placeholder' => 'Cari kajian...', 'type' => 'kajian'])
        </div>
    </section>
    
    <!-- Kajian List -->
    <section class="py-12 bg-white" aria-labelledby="kajian-list-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="kajian-list-heading" class="sr-only">Daftar Kajian</h2>
            
            @if($kajians->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <p class="text-gray-500 font-medium text-lg">Belum ada kajian yang tersedia</p>
                    <p class="text-gray-400 text-sm mt-1">Silakan kembali lagi nanti untuk melihat kajian terbaru</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($kajians as $kajian)
                        <x-kajian-card :kajian="[
                            'judul_kajian' => $kajian->judul,
                            'penceramah' => $kajian->penceramah,
                            'tanggal' => $kajian->tanggal ? $kajian->tanggal->format('d M Y') : null,
                            'waktu' => $kajian->waktu ? substr($kajian->waktu, 0, 5) . ' WIB' : null,
                            'image' => $kajian->gambar ? Storage::url($kajian->gambar) : asset('picture/masjid.jpg'),
                            'slug' => $kajian->id
                        ]" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layouts.public>
