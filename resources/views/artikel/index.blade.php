@php
$title = 'Artikel';
$description = 'Daftar artikel dan tulisan bermanfaat tentang Islam dan kehidupan sehari-hari';
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Artikel</h1>
            <p class="text-xl text-green-100 max-w-2xl">
                Baca artikel dan tulisan bermanfaat tentang Islam dan kehidupan sehari-hari
            </p>
        </div>
    </section>
    
    <!-- Search Bar -->
    <section class="py-8 bg-navy-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('search-bar', ['placeholder' => 'Cari artikel...', 'type' => 'artikel'])
        </div>
    </section>
    
    <!-- Articles List -->
    <section class="py-12 bg-white" aria-labelledby="articles-list-heading">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="articles-list-heading" class="sr-only">Daftar Artikel</h2>
            
            @livewire('articles-list')
            
            <!-- Pagination will be handled by Livewire component -->
        </div>
    </section>
</x-layouts.public>

