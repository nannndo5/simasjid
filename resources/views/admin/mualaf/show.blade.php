<x-layouts.dashboard title="Detail Data Mualaf">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Detail Data Mualaf</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.mualaf.edit', $mualaf) }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.mualaf.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            @if($mualaf->gambar)
                <div class="mb-6">
                    <img src="{{ Storage::url($mualaf->gambar) }}" alt="Mualaf" class="w-full h-auto max-h-96 object-cover rounded-lg border border-gray-300 shadow-md">
                </div>
            @endif

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Deskripsi -->
                @if($mualaf->deskripsi)
                    <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Deskripsi</dt>
                        <dd class="text-base text-gray-900 mt-2 whitespace-pre-line">{{ $mualaf->deskripsi }}</dd>
                    </div>
                @endif

                <!-- Dibuat Pada -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Dibuat Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $mualaf->created_at->format('d F Y, H:i') }}</dd>
                </div>

                <!-- Diperbarui Pada -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Diperbarui Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $mualaf->updated_at->format('d F Y, H:i') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts.dashboard>
