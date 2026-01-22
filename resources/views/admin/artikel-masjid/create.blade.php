<x-layouts.dashboard title="Tambah Data Artikel Masjid">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
            <h3 class="text-xl font-bold text-white">Tambah Data Artikel Masjid Baru</h3>
        </div>
        
        <div class="p-6">
            <form action="{{ route('admin.artikel-masjid.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Judul -->
                    <div class="md:col-span-2">
                        <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                            Judul Artikel <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required maxlength="150" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('judul') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Masukkan judul artikel">
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('tanggal') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                        @error('tanggal')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori
                        </label>
                        <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('kategori') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Contoh: Akidah, Fiqh, Akhlak">
                        @error('kategori')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Penulis -->
                    <div class="md:col-span-2">
                        <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-2">
                            Penulis
                        </label>
                        <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('penulis') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Masukkan nama penulis artikel">
                        @error('penulis')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="md:col-span-2">
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi / Isi Artikel
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="8" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors @error('deskripsi') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror" placeholder="Masukkan deskripsi atau isi artikel">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="md:col-span-2">
                        <label for="gambar" class="block text-sm font-semibold text-gray-700 mb-2">
                            Gambar / Foto
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-400 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                        <span>Upload file</span>
                                        <input id="gambar" name="gambar" type="file" accept="image/*" class="sr-only" onchange="previewImage(this)">
                                    </label>
                                    <p class="pl-1">atau drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF sampai 2MB</p>
                                <div id="image-preview" class="mt-4 hidden">
                                    <img id="preview-img" src="" alt="Preview" class="mx-auto h-48 w-auto rounded-lg border border-gray-300">
                                </div>
                            </div>
                        </div>
                        @error('gambar')
                            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.artikel-masjid.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
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

    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
            }
        }
    </script>
</x-layouts.dashboard>
