<x-layouts.dashboard title="Detail Data Kegiatan Masjid">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Detail Data Kegiatan Masjid</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.kegiatan-masjid.edit', $kegiatanMasjid) }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.kegiatan-masjid.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            @if($kegiatanMasjid->gambar)
                <div class="mb-6">
                    <img src="{{ Storage::url($kegiatanMasjid->gambar) }}" alt="{{ $kegiatanMasjid->judul }}" class="w-full h-auto max-h-96 object-cover rounded-lg border border-gray-300 shadow-md">
                </div>
            @endif

            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul -->
                <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Judul Kegiatan</dt>
                    <dd class="text-lg font-semibold text-gray-900">{{ $kegiatanMasjid->judul }}</dd>
                </div>

                <!-- Tanggal -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tanggal</dt>
                    <dd class="text-sm text-gray-700 mt-1 flex items-center">
                        <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $kegiatanMasjid->tanggal->format('d F Y') }}
                    </dd>
                </div>

                <!-- Waktu -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Waktu</dt>
                    <dd class="text-sm text-gray-700 mt-1 flex items-center">
                        <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $kegiatanMasjid->waktu }} WIB
                    </dd>
                </div>

                <!-- Lokasi -->
                @if($kegiatanMasjid->lokasi)
                    <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Lokasi</dt>
                        <dd class="text-sm text-gray-700 mt-1 flex items-center">
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $kegiatanMasjid->lokasi }}
                        </dd>
                    </div>
                @endif

                <!-- Deskripsi -->
                @if($kegiatanMasjid->deskripsi)
                    <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                        <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Deskripsi Kegiatan</dt>
                        <dd class="text-base text-gray-900 mt-2 whitespace-pre-line">{{ $kegiatanMasjid->deskripsi }}</dd>
                    </div>
                @endif

                <!-- Dibuat Pada -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Dibuat Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $kegiatanMasjid->created_at->format('d F Y, H:i') }}</dd>
                </div>

                <!-- Diperbarui Pada -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Diperbarui Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $kegiatanMasjid->updated_at->format('d F Y, H:i') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts.dashboard>
