@props(['title', 'subtitle', 'image', 'imageAlt' => 'Hero image', 'showCTA' => true, 'images' => null])

<section class="relative h-64 md:h-96 lg:h-[560px] overflow-hidden bg-navy-900" aria-label="Hero section">
    <div class="absolute inset-0 hero-carousel" style="z-index: 1; width: 100%; height: 100%;">
        @if($images && is_array($images) && count($images) > 0)
            @foreach($images as $index => $img)
                <img 
                    src="{{ $img }}" 
                    alt="{{ $imageAlt }}"
                    class="hero-slide {{ $index === 0 ? 'active' : '' }}"
                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                    data-index="{{ $index }}"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; {{ $index === 0 ? 'opacity: 1;' : 'opacity: 0;' }}"
                >
            @endforeach
        @else
            <img 
                src="{{ $image ?? asset('picture/masjid.jpg') }}" 
                alt="{{ $imageAlt }}"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; opacity: 1; z-index: 1;"
                srcset="{{ $image ?? asset('picture/masjid.jpg') }} 1200w,
                        {{ $image ?? asset('picture/masjid.jpg') }} 800w,
                        {{ $image ?? asset('picture/masjid.jpg') }} 400w"
                sizes="100vw"
                loading="eager"
            >
        @endif
    </div>
    <!-- Gradient Overlay for Text Readability -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/20" style="z-index: 3;"></div>
    
    <!-- Content Overlay -->
    <div class="relative h-full flex items-center justify-center" style="z-index: 10;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-12">
            <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 drop-shadow-lg">
                {{ $title ?? 'Selamat Datang di Islamic Center' }}
            </h1>
            @if(isset($subtitle))
                <p class="text-lg md:text-xl lg:text-2xl text-white/90 max-w-3xl mx-auto mb-8 drop-shadow-md">
                    {{ $subtitle }}
                </p>
            @endif
            
        </div>
    </div>
</section>
