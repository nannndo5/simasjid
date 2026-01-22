<div>
    @if($submitted)
        <div class="bg-green-50 border border-green-200 rounded-lg p-6 text-center">
            <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-green-900 mb-2">Terima Kasih!</h3>
            <p class="text-green-700 mb-4">
                Konfirmasi donasi Anda telah kami terima. Tim kami akan memverifikasi dan menghubungi Anda segera.
            </p>
            <button
                wire:click="resetForm"
                class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors"
            >
                Kirim Donasi Lain
            </button>
        </div>
    @else
        <form wire:submit="submit" class="space-y-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-navy-900 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    class="block w-full px-4 py-2 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900"
                    placeholder="Masukkan nama lengkap"
                    required
                    aria-required="true"
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-navy-900 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input
                    type="email"
                    id="email"
                    wire:model="email"
                    class="block w-full px-4 py-2 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900"
                    placeholder="nama@email.com"
                    required
                    aria-required="true"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-navy-900 mb-2">
                    Nomor Telepon <span class="text-red-500">*</span>
                </label>
                <input
                    type="tel"
                    id="phone"
                    wire:model="phone"
                    class="block w-full px-4 py-2 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900"
                    placeholder="08xxxxxxxxxx"
                    required
                    aria-required="true"
                >
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Amount -->
            <div>
                <label for="amount" class="block text-sm font-medium text-navy-900 mb-2">
                    Jumlah Donasi (Rp) <span class="text-red-500">*</span>
                </label>
                <input
                    type="number"
                    id="amount"
                    wire:model="amount"
                    class="block w-full px-4 py-2 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900"
                    placeholder="100000"
                    min="1000"
                    step="1000"
                    required
                    aria-required="true"
                >
                <p class="mt-1 text-sm text-navy-500">Minimum donasi: Rp 1.000</p>
                @error('amount')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bank -->
            <div>
                <label for="bank" class="block text-sm font-medium text-navy-900 mb-2">
                    Bank Tujuan Transfer <span class="text-red-500">*</span>
                </label>
                <select
                    id="bank"
                    wire:model="bank"
                    class="block w-full px-4 py-2 border border-navy-300 rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-gold-500 text-navy-900"
                    required
                    aria-required="true"
                >
                    <option value="">Pilih Bank</option>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BRI">BRI</option>
                </select>
                @error('bank')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Proof Upload -->
            <div>
                <label for="proof" class="block text-sm font-medium text-navy-900 mb-2">
                    Bukti Transfer <span class="text-red-500">*</span>
                </label>
                <input
                    type="file"
                    id="proof"
                    wire:model="proof"
                    accept="image/*"
                    class="block w-full text-sm text-navy-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gold-500 file:text-navy-900 hover:file:bg-gold-600"
                    required
                    aria-required="true"
                >
                <p class="mt-1 text-sm text-navy-500">Format: JPG, PNG. Maksimal 2MB</p>
                @error('proof')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @if($proof)
                    <div class="mt-2">
                        <img src="{{ $proof->temporaryUrl() }}" alt="Preview bukti transfer" class="max-w-xs h-32 object-cover rounded-lg border border-navy-300">
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-gold-500 hover:bg-gold-600 text-navy-900 px-6 py-3 rounded-lg font-semibold transition-colors shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove>Kirim Konfirmasi Donasi</span>
                    <span wire:loading>Mengirim...</span>
                </button>
            </div>
        </form>
    @endif
</div>

