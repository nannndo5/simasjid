<x-layouts.dashboard title="Tambah Informasi Rekening">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
            <h3 class="text-xl font-bold text-white">Tambah Informasi Rekening Baru</h3>
        </div>
        
        <div class="p-6">
            <form action="{{ route('pengelola-keuangan.informasi-rekening.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Gambar QR -->
                    <div class="md:col-span-2">
                        <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-2">
                            Gambar QR Code
                        </label>
                        <input type="file" name="gambar" id="gambar" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-500 file:text-white hover:file:bg-green-600 @error('gambar') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG. Maksimal 2MB</p>
                        @error('gambar')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bank 1 -->
                    <div>
                        <label for="nama_bank_1" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Bank 1
                        </label>
                        <input type="text" name="nama_bank_1" id="nama_bank_1" value="{{ old('nama_bank_1') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('nama_bank_1') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: BCA">
                        @error('nama_bank_1')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_rekening_1" class="block text-sm font-semibold text-gray-700 mb-2">
                            No Rekening Bank 1
                        </label>
                        <input type="text" name="no_rekening_1" id="no_rekening_1" value="{{ old('no_rekening_1') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('no_rekening_1') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: 1234567890">
                        @error('no_rekening_1')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bank 2 -->
                    <div>
                        <label for="nama_bank_2" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Bank 2
                        </label>
                        <input type="text" name="nama_bank_2" id="nama_bank_2" value="{{ old('nama_bank_2') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('nama_bank_2') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: Mandiri">
                        @error('nama_bank_2')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_rekening_2" class="block text-sm font-semibold text-gray-700 mb-2">
                            No Rekening Bank 2
                        </label>
                        <input type="text" name="no_rekening_2" id="no_rekening_2" value="{{ old('no_rekening_2') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('no_rekening_2') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: 0987654321">
                        @error('no_rekening_2')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bank 3 -->
                    <div>
                        <label for="nama_bank_3" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Bank 3
                        </label>
                        <input type="text" name="nama_bank_3" id="nama_bank_3" value="{{ old('nama_bank_3') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('nama_bank_3') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: BRI">
                        @error('nama_bank_3')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_rekening_3" class="block text-sm font-semibold text-gray-700 mb-2">
                            No Rekening Bank 3
                        </label>
                        <input type="text" name="no_rekening_3" id="no_rekening_3" value="{{ old('no_rekening_3') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('no_rekening_3') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: 1122334455">
                        @error('no_rekening_3')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- WhatsApp -->
                    <div class="md:col-span-2">
                        <label for="no_whatsapp" class="block text-sm font-semibold text-gray-700 mb-2">
                            No WhatsApp
                        </label>
                        <input type="text" name="no_whatsapp" id="no_whatsapp" value="{{ old('no_whatsapp') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('no_whatsapp') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: 081234567890">
                        @error('no_whatsapp')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Aktif -->
                    <div class="md:col-span-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Aktifkan informasi rekening ini
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('pengelola-keuangan.informasi-rekening.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center items-center px-5 py-2.5 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-md hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
