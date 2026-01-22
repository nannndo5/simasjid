<x-layouts.dashboard title="Detail Data Kajian Masjid">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Detail Data Kajian Masjid</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.kajian-masjid.edit', $kajianMasjid) }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.kajian-masjid.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            @if($kajianMasjid->gambar)
                <div class="mb-6">
                    <img src="{{ Storage::url($kajianMasjid->gambar) }}" alt="{{ $kajianMasjid->judul }}" class="w-full h-auto max-h-96 object-cover rounded-lg border border-gray-300 shadow-md">
                </div>
            @endif

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul -->
                <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Judul Kajian</dt>
                    <dd class="text-lg font-semibold text-gray-900">{{ $kajianMasjid->judul }}</dd>
                </div>

                <!-- Penceramah -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Penceramah</dt>
                    <dd class="text-sm text-gray-700 mt-1 flex items-center">
                        @if($kajianMasjid->penceramah)
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            {{ $kajianMasjid->penceramah }}
                        @else
                            <span class="text-gray-400">Tidak ada penceramah</span>
                        @endif
                    </dd>
                </div>

                <!-- Topik -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Topik</dt>
                    <dd class="text-sm text-gray-700 mt-1">
                        @if($kajianMasjid->topik)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                {{ $kajianMasjid->topik }}
                            </span>
                        @else
                            <span class="text-gray-400">Tidak ada topik</span>
                        @endif
                    </dd>
                </div>

                <!-- Tanggal -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tanggal</dt>
                    <dd class="text-sm text-gray-700 mt-1 flex items-center">
                        @if($kajianMasjid->tanggal)
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $kajianMasjid->tanggal->format('d F Y') }}
                        @else
                            <span class="text-gray-400">Tanggal tidak ditentukan</span>
                        @endif
                    </dd>
                </div>

                <!-- Waktu -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Waktu</dt>
                    <dd class="text-sm text-gray-700 mt-1 flex items-center">
                        @if($kajianMasjid->waktu)
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $kajianMasjid->waktu }} WIB
                        @else
                            <span class="text-gray-400">Waktu tidak ditentukan</span>
                        @endif
                    </dd>
                </div>

                <!-- Deskripsi -->
                @if($kajianMasjid->deskripsi)
                    <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Deskripsi</dt>
                        <dd class="text-base text-gray-900 mt-2 whitespace-pre-line">{{ $kajianMasjid->deskripsi }}</dd>
                    </div>
                @endif

                <!-- Dibuat Pada -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Dibuat Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $kajianMasjid->created_at->format('d F Y, H:i') }}</dd>
                </div>

                <!-- Diperbarui Pada -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Diperbarui Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $kajianMasjid->updated_at->format('d F Y, H:i') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts.dashboard>
