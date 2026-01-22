<x-layouts.dashboard title="Data TPQ">
    <!-- Action Bar -->
    <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <h3 class="text-lg font-semibold text-navy-900">Daftar TPQ</h3>
        <a href="{{ route('admin.tpq.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-md hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Data
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <form method="GET" action="{{ route('admin.tpq.index') }}" class="flex gap-3">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari berdasarkan deskripsi..." 
                    class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm"
                >
            </div>
            <button type="submit" class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition-colors">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('admin.tpq.index') }}" class="px-5 py-2.5 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-navy-50 to-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">Gambar</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">Deskripsi</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">Tanggal Dibuat</th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-navy-900 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($tpqs as $index => $tpq)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($tpq->gambar)
                                    <div class="flex-shrink-0 h-16 w-24">
                                        <img src="{{ Storage::url($tpq->gambar) }}" alt="TPQ" class="h-16 w-24 rounded-lg object-cover border border-gray-200">
                                    </div>
                                @else
                                    <div class="flex-shrink-0 h-16 w-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 max-w-xs truncate">{{ Str::limit($tpq->deskripsi ?? '', 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    <svg class="h-4 w-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $tpq->created_at->format('d M Y') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end items-center space-x-2">
                                    <a href="{{ route('admin.tpq.show', $tpq) }}" class="inline-flex items-center justify-center w-8 h-8 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors" title="Lihat Detail">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.tpq.edit', $tpq) }}" class="inline-flex items-center justify-center w-8 h-8 text-indigo-600 hover:text-indigo-800 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.tpq.destroy', $tpq) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data TPQ ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center w-8 h-8 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">Tidak ada data TPQ</p>
                                    <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan data TPQ baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
