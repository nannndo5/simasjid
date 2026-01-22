<x-layouts.dashboard title="Data Infaq">
    <!-- Summary Card -->
    <div class="mb-6 bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-green-100 text-sm font-medium mb-1">Total Pemasukan</p>
                <p class="text-4xl font-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm p-4 rounded-lg">
                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Action Bar -->
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-navy-900">Daftar Transaksi Infaq</h3>
        <a href="{{ route('admin.infaq.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-md hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Data
        </a>
    </div>

    <!-- Filters Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 mb-6">
        <h4 class="text-sm font-semibold text-navy-900 mb-4">Filter Data</h4>
        <form method="GET" action="{{ route('admin.infaq.index') }}" class="grid grid-cols-1 md:grid-cols-6 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari Keterangan</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari keterangan..." class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors">
            </div>
            <div>
                <label for="jenis_transaksi" class="block text-sm font-medium text-gray-700 mb-2">Jenis Transaksi</label>
                <select name="jenis_transaksi" id="jenis_transaksi" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors">
                    <option value="">Semua Jenis</option>
                    <option value="infaq" {{ request('jenis_transaksi') === 'infaq' ? 'selected' : '' }}>Infaq</option>
                    <option value="sedekah" {{ request('jenis_transaksi') === 'sedekah' ? 'selected' : '' }}>Sedekah</option>
                    <option value="donasi" {{ request('jenis_transaksi') === 'donasi' ? 'selected' : '' }}>Donasi</option>
                    <option value="pengeluaran" {{ request('jenis_transaksi') === 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors">
            </div>
            <div>
                <label for="bulan" class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                <input type="month" name="bulan" id="bulan" value="{{ request('bulan') }}" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors">
            </div>
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select name="kategori" id="kategori" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm transition-colors">
                    <option value="">Semua Kategori</option>
                    <option value="uang masuk" {{ request('kategori') === 'uang masuk' ? 'selected' : '' }}>Uang Masuk</option>
                    <option value="uang keluar" {{ request('kategori') === 'uang keluar' ? 'selected' : '' }}>Uang Keluar</option>
                </select>
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 inline-flex justify-center items-center px-4 py-2.5 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-md hover:from-green-700 hover:to-green-800 transition-all duration-200">
                    Filter
                </button>
                <a href="{{ route('admin.infaq.index') }}" class="inline-flex justify-center items-center px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-navy-50 to-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            <a href="{{ route('admin.infaq.index', array_merge(request()->all(), ['sort_by' => 'tanggal', 'sort_dir' => request('sort_dir') === 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center space-x-1 hover:text-green-600 transition-colors">
                                <span>Tanggal</span>
                                @if(request('sort_by') === 'tanggal')
                                    @if(request('sort_dir') === 'asc')
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                                    @else
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            <a href="{{ route('admin.infaq.index', array_merge(request()->all(), ['sort_by' => 'jumlah', 'sort_dir' => request('sort_dir') === 'asc' ? 'desc' : 'asc'])) }}" class="flex items-center space-x-1 hover:text-green-600 transition-colors">
                                <span>Jumlah</span>
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Jenis Transaksi
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-navy-900 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($infaqs as $infaq)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($infaq->tanggal)->format('d/m/Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-bold text-green-600">Rp {{ number_format($infaq->jumlah, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $infaq->jenis_transaksi === 'infaq' ? 'bg-blue-100 text-blue-800' : ($infaq->jenis_transaksi === 'sedekah' ? 'bg-green-100 text-green-800' : ($infaq->jenis_transaksi === 'donasi' ? 'bg-purple-100 text-purple-800' : 'bg-red-100 text-red-800')) }}">
                                    {{ ucfirst($infaq->jenis_transaksi) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($infaq->kategori)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $infaq->kategori === 'uang masuk' ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                                        {{ ucfirst(str_replace(' ', ' ', $infaq->kategori)) }}
                                    </span>
                                @else
                                    <span class="text-sm text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 max-w-xs truncate">
                                    {{ $infaq->keterangan ?? '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end items-center space-x-2">
                                    <a href="{{ route('admin.infaq.show', $infaq) }}" class="inline-flex items-center justify-center w-8 h-8 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors" title="Lihat Detail">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.infaq.edit', $infaq) }}" class="inline-flex items-center justify-center w-8 h-8 text-indigo-600 hover:text-indigo-800 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.infaq.destroy', $infaq) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">Tidak ada data infaq</p>
                                    <p class="text-gray-400 text-sm mt-1">Mulai dengan menambahkan data infaq baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($infaqs->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span class="font-medium">{{ $infaqs->firstItem() }}</span> sampai <span class="font-medium">{{ $infaqs->lastItem() }}</span> dari <span class="font-medium">{{ $infaqs->total() }}</span> data
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $infaqs->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Daftar Informasi Rekening Section -->
    <div class="mt-8">
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
    </div>
</x-layouts.dashboard>
