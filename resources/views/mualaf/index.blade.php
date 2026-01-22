@php
$title = 'Mualaf';
$description = 'Program Mualaf Islamic Center';
@endphp

<x-layouts.public :title="$title" :description="$description">
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-green-600 to-green-700 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-4xl md:text-5xl font-bold mb-4">Mualaf</h1>
            <p class="text-xl text-green-100 max-w-2xl">
                Program Mualaf Islamic Center
            </p>
        </div>
    </section>

    <!-- Mualaf Content Section -->
    <section class="py-12 md:py-16 bg-white" aria-labelledby="mualaf-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 id="mualaf-heading" class="font-heading text-3xl md:text-4xl font-bold text-navy-900 mb-8 text-center">
                    Program Mualaf
                </h2>

                @forelse($mualafs as $index => $mualaf)
                    <div class="mb-12 flex flex-col {{ $index % 2 === 1 ? 'md:flex-row-reverse' : 'md:flex-row' }} gap-6 md:gap-8 items-center">
                        @if($mualaf->gambar)
                            <div class="w-full md:w-96 flex-shrink-0">
                                <div class="relative h-64 md:h-80 rounded-lg overflow-hidden shadow-lg">
                                    <img 
                                        src="{{ Storage::url($mualaf->gambar) }}" 
                                        alt="Gambar Mualaf"
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                    >
                                </div>
                            </div>
                        @endif
                        
                        @if($mualaf->deskripsi)
                            <div class="flex-1">
                                <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg shadow-lg p-6 md:p-8">
                                    <p class="text-white text-lg leading-relaxed font-medium" style="text-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                                        {{ $mualaf->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-12">
                        <p class="text-navy-600 text-lg">Belum ada data Mualaf.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.public>
