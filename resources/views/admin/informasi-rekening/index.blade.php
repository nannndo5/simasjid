<x-layouts.dashboard title="Daftar Informasi Rekening">
    <!-- Action Bar -->
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-navy-900">Daftar Informasi Rekening</h3>
        <a href="{{ route('admin.informasi-rekening.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-md hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Data
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-navy-50 to-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Gambar QR
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Bank 1
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Bank 2
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Bank 3
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            WhatsApp
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($rekenings as $rekening)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($rekening->gambar)
                                    <img src="{{ Storage::url($rekening->gambar) }}" alt="QR Code" class="h-16 w-16 object-cover rounded-lg">
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($rekening->nama_bank_1)
                                    <div class="text-sm font-medium text-gray-900">{{ $rekening->nama_bank_1 }}</div>
                                    <div class="text-sm text-gray-500">{{ $rekening->no_rekening_1 }}</div>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($rekening->nama_bank_2)
                                    <div class="text-sm font-medium text-gray-900">{{ $rekening->nama_bank_2 }}</div>
                                    <div class="text-sm text-gray-500">{{ $rekening->no_rekening_2 }}</div>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($rekening->nama_bank_3)
                                    <div class="text-sm font-medium text-gray-900">{{ $rekening->nama_bank_3 }}</div>
                                    <div class="text-sm text-gray-500">{{ $rekening->no_rekening_3 }}</div>
                                @else
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $rekening->no_whatsapp ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $rekening->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $rekening->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end items-center space-x-2">
                                    <a href="{{ route('admin.informasi-rekening.show', $rekening) }}" class="inline-flex items-center justify-center w-8 h-8 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors" title="Lihat Detail">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.informasi-rekening.edit', $rekening) }}" class="inline-flex items-center justify-center w-8 h-8 text-indigo-600 hover:text-indigo-800 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.informasi-rekening.destroy', $rekening) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">Tidak ada data informasi rekening</p>
                                    <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan informasi rekening baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($rekenings->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $rekenings->links() }}
            </div>
        @endif
    </div>
</x-layouts.dashboard>
