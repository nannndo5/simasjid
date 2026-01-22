<div>
    <div class="relative max-w-2xl mx-auto">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <input
            type="text"
            wire:model.live.debounce.300ms="query"
            class="block w-full pl-12 pr-4 py-3 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900 placeholder-navy-400"
            placeholder="{{ $placeholder }}"
            aria-label="Search input"
        >
        @if($query)
            <button
                type="button"
                wire:click="clearSearch"
                class="absolute inset-y-0 right-0 pr-4 flex items-center text-navy-400 hover:text-navy-600"
                aria-label="Clear search"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        @endif
    </div>
    
    @if($query)
        <div class="mt-4 text-center text-sm text-navy-600">
            Menampilkan hasil untuk: <span class="font-semibold">{{ $query }}</span>
        </div>
    @endif
</div>
