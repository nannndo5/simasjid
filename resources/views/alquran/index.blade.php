@php
$title = 'AL-Quran';
$description = 'Daftar AL-Quran dan referensi keagamaan';
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">AL-Quran</h1>
            <p class="text-xl text-green-100 max-w-2xl">
                Baca AL-Quran dan referensi keagamaan yang bermanfaat
            </p>
        </div>
    </section>
    
    <!-- Search Bar -->
    <section class="py-8 bg-navy-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @livewire('search-bar', ['placeholder' => 'Cari AL-Quran...', 'type' => 'alquran'])
        </div>
    </section>
    
    <!-- AL-Quran List -->
    <section class="py-12 bg-white" aria-labelledby="alquran-list-heading">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="alquran-list-heading" class="sr-only">Daftar AL-Quran</h2>
            
            @livewire('alquran-list')
            
            <!-- Pagination will be handled by Livewire component -->
        </div>
    </section>
</x-layouts.public>
