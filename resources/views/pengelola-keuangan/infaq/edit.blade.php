<x-layouts.dashboard title="Edit Data Infaq">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4">
            <h3 class="text-xl font-bold text-white">Edit Data Infaq</h3>
        </div>
        
        <div class="p-6">
            <form action="{{ route('pengelola-keuangan.infaq.update', $infaq) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $infaq->tanggal->format('Y-m-d')) }}" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('tanggal') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                        @error('tanggal')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jumlah" class="block text-sm font-semibold text-gray-700 mb-2">
                            Jumlah (Rp) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">Rp</span>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $infaq->jumlah) }}" step="0.01" min="0" required class="block w-full pl-10 pr-3 py-2.5 rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('jumlah') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="0">
                        </div>
                        @error('jumlah')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jenis_transaksi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Jenis Transaksi <span class="text-red-500">*</span>
                        </label>
                        <select name="jenis_transaksi" id="jenis_transaksi" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('jenis_transaksi') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="">Pilih Jenis Transaksi</option>
                            <option value="infaq" {{ old('jenis_transaksi', $infaq->jenis_transaksi) === 'infaq' ? 'selected' : '' }}>Infaq</option>
                            <option value="sedekah" {{ old('jenis_transaksi', $infaq->jenis_transaksi) === 'sedekah' ? 'selected' : '' }}>Sedekah</option>
                            <option value="donasi" {{ old('jenis_transaksi', $infaq->jenis_transaksi) === 'donasi' ? 'selected' : '' }}>Donasi</option>
                            <option value="pengeluaran" {{ old('jenis_transaksi', $infaq->jenis_transaksi) === 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>
                        @error('jenis_transaksi')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori
                        </label>
                        <select name="kategori" id="kategori" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('kategori') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="">Pilih Kategori</option>
                            <option value="uang masuk" {{ old('kategori', $infaq->kategori) === 'uang masuk' ? 'selected' : '' }}>Uang Masuk</option>
                            <option value="uang keluar" {{ old('kategori', $infaq->kategori) === 'uang keluar' ? 'selected' : '' }}>Uang Keluar</option>
                        </select>
                        @error('kategori')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Keterangan
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="4" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('keterangan') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Masukkan keterangan (opsional)">{{ old('keterangan', $infaq->keterangan) }}</textarea>
                        @error('keterangan')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('pengelola-keuangan.infaq.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-medium rounded-lg shadow-md hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>
