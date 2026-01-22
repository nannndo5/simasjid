@php
$title = 'Kegiatan';
$description = 'Daftar kegiatan dan acara yang diselenggarakan oleh Islamic Center';
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-navy-900 to-navy-800 text-white py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Kegiatan</h1>
            <p class="text-xl text-navy-200 max-w-2xl">
                Daftar kegiatan dan acara yang diselenggarakan oleh Islamic Center
            </p>
        </div>
    </section>
    
    <!-- Search Bar -->
    <section class="py-8 bg-navy-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('search-bar', ['placeholder' => 'Cari kegiatan...', 'type' => 'kegiatan'])
        </div>
    </section>
    
    <!-- Events List -->
    <section class="py-12 bg-white" aria-labelledby="events-list-heading">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="events-list-heading" class="sr-only">Daftar Kegiatan</h2>
            
            @livewire('events-list')
            
            <!-- Pagination will be handled by Livewire component -->
        </div>
    </section>
</x-layouts.public>

