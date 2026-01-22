<div class="space-y-6">
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Events Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-gold-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-navy-600">Kegiatan</p>
                    <p class="text-3xl font-bold text-navy-900 mt-2">{{ $stats['events'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-gold-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('kegiatan.index') }}" class="text-sm text-gold-600 hover:text-gold-700 font-medium mt-4 inline-block">
                Lihat semua →
            </a>
        </div>

        <!-- Articles Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-navy-600">Artikel</p>
                    <p class="text-3xl font-bold text-navy-900 mt-2">{{ $stats['articles'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('artikel.index') }}" class="text-sm text-green-600 hover:text-green-700 font-medium mt-4 inline-block">
                Lihat semua →
            </a>
        </div>

        <!-- Donations Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-navy-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-navy-600">Donasi</p>
                    <p class="text-3xl font-bold text-navy-900 mt-2">Rp {{ number_format($stats['donations'] ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 bg-navy-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('infaq') }}" class="text-sm text-navy-600 hover:text-navy-700 font-medium mt-4 inline-block">
                Lihat semua →
            </a>
        </div>

        <!-- Subscribers Card -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-gold-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-navy-600">Subscriber</p>
                    <p class="text-3xl font-bold text-navy-900 mt-2">{{ $stats['subscribers'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-gold-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-navy-500 mt-4">Newsletter subscribers</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-navy-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a
                href="{{ route('kegiatan.index') }}"
                class="flex items-center p-4 border border-navy-200 rounded-lg hover:bg-navy-50 transition-colors"
            >
                <svg class="w-6 h-6 text-gold-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-medium text-navy-900">Tambah Kegiatan</span>
            </a>
            <a
                href="{{ route('artikel.index') }}"
                class="flex items-center p-4 border border-navy-200 rounded-lg hover:bg-navy-50 transition-colors"
            >
                <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-medium text-navy-900">Tambah Artikel</span>
            </a>
            <a
                href="{{ route('infaq') }}"
                class="flex items-center p-4 border border-navy-200 rounded-lg hover:bg-navy-50 transition-colors"
            >
                <svg class="w-6 h-6 text-navy-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="font-medium text-navy-900">Kelola Donasi</span>
            </a>
        </div>
    </div>

    <!-- Recent Activity (Placeholder) -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-navy-900 mb-4">Aktivitas Terkini</h2>
        <div class="text-center py-12 text-navy-500">
            <p>Tidak ada aktivitas terkini</p>
            <p class="text-sm mt-2">Aktivitas akan muncul di sini ketika backend dihubungkan</p>
        </div>
    </div>
</div>

