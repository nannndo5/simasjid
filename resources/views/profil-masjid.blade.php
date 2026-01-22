@php
$title = 'Profil Masjid';
$description = 'Profil dan sejarah singkat Masjid Islamic Center Bangkinang';
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Profil Masjid</h1>
            <p class="text-xl text-green-100 max-w-2xl">
                Islamic Center Bangkinang - Masjid Al-Ikhsan
            </p>
        </div>
    </section>

    <!-- Profil dan Sejarah Singkat Section -->
    <section class="py-12 md:py-16 bg-white" aria-labelledby="profil-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 id="profil-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-8 text-center">
                    Profil dan Sejarah Singkat
                </h2>

                @forelse($profils as $index => $profil)
                    <div class="mb-12 flex flex-col {{ $index % 2 === 1 ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-6 md:gap-8 items-center">
                        <div class="flex-1 order-2 md:order-1">
                            <p class="text-navy-600 text-lg leading-relaxed">
                                {{ $profil->sejarah }}
                            </p>
                        </div>
                        <div class="w-full md:w-96 flex-shrink-0 order-1 md:order-2">
                            <div class="relative h-64 md:h-80 rounded-lg overflow-hidden shadow-lg">
                                @if($profil->gambar)
                                    <img 
                                        src="{{ Storage::url($profil->gambar) }}" 
                                        alt="Gambar Profil Masjid"
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <p class="text-navy-600 text-lg">Belum ada data profil masjid.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Lokasi Section -->
    <section class="py-12 md:py-16 bg-navy-50" aria-labelledby="lokasi-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 id="lokasi-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-8 text-center">
                    Lokasi
                </h2>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Address Information -->
                    <div class="p-6 md:p-8 border-b border-navy-200">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-green-600 mr-4 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div class="flex-1">
                                <h3 class="font-heading text-xl font-semibold text-navy-900 mb-2">
                                    Alamat Masjid
                                </h3>
                                <p class="text-navy-600 text-lg leading-relaxed mb-4">
                                    Jl. Profesor Moh. Yamin SH No.439, Langgini, Kec. Bangkinang, Kabupaten Kampar, Riau 28463
                                </p>
                                <a 
                                    href="https://maps.app.goo.gl/7oP2ALHKZwrBAwiz9" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center text-green-600 hover:text-green-700 font-medium transition-colors"
                                    aria-label="Buka di Google Maps"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Buka di Google Maps
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Direct link button to Google Maps -->
                    <div class="p-6 md:p-8 text-center bg-green-50">
                        <a 
                            href="https://maps.app.goo.gl/7oP2ALHKZwrBAwiz9" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg"
                            aria-label="Buka lokasi di Google Maps"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
