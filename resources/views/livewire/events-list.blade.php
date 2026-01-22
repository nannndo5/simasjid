<div>
    @if($search)
        <div class="mb-6">
            <p class="text-navy-600">
                Menampilkan hasil pencarian untuk: <span class="font-semibold text-navy-900">{{ $search }}</span>
            </p>
        </div>
    @endif

    @if(empty($events))
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-navy-900">Tidak ada kegiatan ditemukan</h3>
            <p class="mt-1 text-sm text-navy-500">Coba ubah kata kunci pencarian Anda.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <x-event-card :event="$event" />
            @endforeach
        </div>

        @if(!$limit && count($events) >= 6)
            <div class="mt-8 flex justify-center">
                <nav class="flex items-center space-x-2" aria-label="Pagination">
                    <button
                        wire:click="previousPage"
                        class="px-4 py-2 border border-navy-300 rounded-md text-navy-700 hover:bg-navy-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        aria-label="Previous page"
                    >
                        Sebelumnya
                    </button>
                    <span class="px-4 py-2 text-navy-700">
                        Halaman 1
                    </span>
                    <button
                        wire:click="nextPage"
                        class="px-4 py-2 border border-navy-300 rounded-md text-navy-700 hover:bg-navy-50 disabled:opacity-50 disabled:cursor-not-allowed"
                        aria-label="Next page"
                    >
                        Selanjutnya
                    </button>
                </nav>
            </div>
        @endif
    @endif
</div>

