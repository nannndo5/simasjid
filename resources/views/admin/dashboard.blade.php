<x-layouts.dashboard title="Dashboard">
    <!-- Welcome Card -->
    <div class="mb-6 bg-gradient-to-r from-navy-700 via-navy-800 to-navy-900 rounded-xl shadow-xl p-6 text-white overflow-hidden relative">
        <div class="relative z-10">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->username }}!</h2>
            <p class="text-navy-200">Sistem Informasi Manajemen Administrasi Masjid</p>
        </div>
        <div class="absolute right-0 top-0 bottom-0 w-64 opacity-10">
            <svg class="h-full w-full" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Profil Masjid</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['profil_masjid'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Kegiatan</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['kegiatan'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Artikel</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['artikel'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Kajian</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['kajian'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-pink-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Konten</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['konten'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-amber-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Kitab</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['kitab'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-teal-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">AL-Quran</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['alquran'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-cyan-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">TPQ</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['tpq'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-orange-100 p-3 rounded-lg">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-500">Mualaf</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['mualaf'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-white/20 backdrop-blur-sm p-3 rounded-lg">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-green-100">Total Infaq</p>
                        <p class="text-2xl font-bold text-white mt-1">Rp {{ number_format($stats['total_infaq'], 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Infaqs Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold text-navy-900">Transaksi Infaq Terbaru</h3>
                <a href="{{ route('admin.infaq.index') }}" class="text-sm font-medium text-green-600 hover:text-green-700 transition-colors">
                    Lihat semua →
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($recentInfaqs as $infaq)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($infaq->tanggal)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">
                                Rp {{ number_format($infaq->jumlah, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $infaq->jenis_transaksi === 'infaq' ? 'bg-blue-100 text-blue-800' : ($infaq->jenis_transaksi === 'sedekah' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800') }}">
                                    {{ ucfirst($infaq->jenis_transaksi) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">
                                {{ Str::limit($infaq->keterangan ?? '-', 30) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="h-12 w-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-gray-500 font-medium">Belum ada data infaq</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>
