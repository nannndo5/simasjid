<div>
    @if($subscribed)
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 text-center">
            <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-green-900 mb-2">Berhasil Berlangganan!</h3>
            <p class="text-green-700">
                Terima kasih telah berlangganan newsletter kami. Anda akan menerima update terbaru melalui email.
            </p>
        </div>
    @else
        <form wire:submit="subscribe" class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
            <div class="flex-1">
                <label for="email" class="sr-only">Email address</label>
                <input
                    type="email"
                    id="email"
                    wire:model="email"
                    class="block w-full px-4 py-3 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900 placeholder-navy-400"
                    placeholder="Masukkan email Anda"
                    required
                    aria-required="true"
                    aria-label="Email address"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <button
                type="submit"
                wire:loading.attr="disabled"
                class="px-6 py-3 bg-gold-500 hover:bg-gold-600 text-navy-900 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap"
            >
                <span wire:loading.remove>Berlangganan</span>
                <span wire:loading>Mengirim...</span>
            </button>
        </form>
    @endif
</div>

