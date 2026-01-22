<x-layouts.dashboard title="Detail Data Infaq">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold text-white">Detail Data Infaq</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.infaq.edit', $infaq) }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('admin.infaq.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white font-medium rounded-lg hover:bg-white/30 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tanggal</dt>
                    <dd class="text-lg font-semibold text-gray-900">{{ \Carbon\Carbon::parse($infaq->tanggal)->format('d F Y') }}</dd>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4 border border-green-200">
                    <dt class="text-xs font-semibold text-green-700 uppercase tracking-wider mb-1">Jumlah</dt>
                    <dd class="text-2xl font-bold text-green-700">Rp {{ number_format($infaq->jumlah, 0, ',', '.') }}</dd>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Jenis Transaksi</dt>
                    <dd>
                        <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-semibold
                            {{ $infaq->jenis_transaksi === 'infaq' ? 'bg-blue-100 text-blue-800' : ($infaq->jenis_transaksi === 'sedekah' ? 'bg-green-100 text-green-800' : ($infaq->jenis_transaksi === 'donasi' ? 'bg-purple-100 text-purple-800' : 'bg-red-100 text-red-800')) }}">
                            {{ ucfirst($infaq->jenis_transaksi) }}
                        </span>
                    </dd>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 md:col-span-2">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Keterangan</dt>
                    <dd class="text-base text-gray-900 mt-2">{{ $infaq->keterangan ?? '-' }}</dd>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Dibuat Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $infaq->created_at->format('d F Y, H:i') }}</dd>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Diperbarui Pada</dt>
                    <dd class="text-sm text-gray-700 mt-1">{{ $infaq->updated_at->format('d F Y, H:i') }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-layouts.dashboard>
