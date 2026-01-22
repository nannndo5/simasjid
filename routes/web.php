<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

// Public Routes
Route::get('/', function () {
    // Jika user sudah login, redirect ke dashboard sesuai role
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->isKeuangan()) {
            return redirect()->route('pengelola-keuangan.infaq.index');
        }
    }

    return view('home');
})->name('home');

Route::get('/profil-masjid', function () {
    $profils = \App\Models\ProfilMasjid::orderBy('created_at', 'asc')->get();

    return view('profil-masjid', compact('profils'));
})->name('profil-masjid');

Route::get('/kegiatan', function () {
    return view('kegiatan.index');
})->name('kegiatan.index');

Route::get('/kegiatan/{slug}', function ($slug) {
    return view('kegiatan.show', ['slug' => $slug]);
})->name('kegiatan.show');

Route::get('/artikel', function () {
    return view('artikel.index');
})->name('artikel.index');

Route::get('/artikel/{slug}', function ($slug) {
    // Extract ID from slug (format: judul-slug-id)
    $parts = explode('-', $slug);
    $id = end($parts);

    $artikel = \App\Models\ArtikelMasjid::find($id);

    if (! $artikel) {
        abort(404);
    }

    return view('artikel.show', ['artikel' => $artikel]);
})->name('artikel.show');

Route::get('/kajian', function () {
    return view('kajian.index');
})->name('kajian.index');

Route::get('/kajian/{slug}', function ($slug) {
    return view('kajian.show', ['slug' => $slug]);
})->name('kajian.show');

Route::get('/konten', function () {
    return view('konten.index');
})->name('konten.index');

Route::get('/konten/{slug}', function ($slug) {
    return view('konten.show', ['slug' => $slug]);
})->name('konten.show');

// Perpustakaan Routes
Route::get('/kitab', function () {
    return view('kitab.index');
})->name('kitab.index');

Route::get('/kitab/{slug}', function ($slug) {
    $parts = explode('-', $slug);
    $id = end($parts);
    $kitab = \App\Models\KitabMasjid::find($id);
    if (!$kitab) {
        abort(404);
    }
    return view('kitab.show', ['kitab' => $kitab]);
})->name('kitab.show');

Route::get('/alquran', function () {
    return view('alquran.index');
})->name('alquran.index');

Route::get('/alquran/{slug}', function ($slug) {
    $parts = explode('-', $slug);
    $id = end($parts);
    $alquran = \App\Models\AlquranMasjid::find($id);
    if (!$alquran) {
        abort(404);
    }
    return view('alquran.show', ['alquran' => $alquran]);
})->name('alquran.show');

// Layanan Routes
Route::get('/tpq', function () {
    $tpqs = \App\Models\Tpq::orderBy('created_at', 'desc')->get();
    return view('tpq.index', compact('tpqs'));
})->name('tpq.index');

Route::get('/mualaf', function () {
    $mualafs = \App\Models\Mualaf::orderBy('created_at', 'desc')->get();
    return view('mualaf.index', compact('mualafs'));
})->name('mualaf.index');

Route::get('/infaq', function (\Illuminate\Http\Request $request) {
    $informasiRekening = \App\Models\InformasiRekening::active()->first();
    
    // Get selected jenis transaksi from query string
    $selectedJenis = $request->query('jenis');
    $validJenis = ['infaq', 'donasi', 'sedekah', 'pengeluaran'];
    $isFiltered = $selectedJenis && in_array($selectedJenis, $validJenis);
    
    // Get page numbers from query string, default to 1
    $infaqPage = max(1, (int) $request->query('infaq_page', 1));
    $donasiPage = max(1, (int) $request->query('donasi_page', 1));
    $sedekahPage = max(1, (int) $request->query('sedekah_page', 1));
    $pengeluaranPage = max(1, (int) $request->query('pengeluaran_page', 1));
    
    $perPage = 5;
    
    // Get paginated data for each type
    $infaqQuery = \App\Models\Infaq::where('jenis_transaksi', 'infaq')->orderBy('tanggal', 'desc');
    $countInfaq = $infaqQuery->count();
    $infaqs = $infaqQuery->skip(($infaqPage - 1) * $perPage)->take($perPage)->get();
    $totalPagesInfaq = (int) ceil($countInfaq / $perPage);
    
    $donasiQuery = \App\Models\Infaq::where('jenis_transaksi', 'donasi')->orderBy('tanggal', 'desc');
    $countDonasi = $donasiQuery->count();
    $donasis = $donasiQuery->skip(($donasiPage - 1) * $perPage)->take($perPage)->get();
    $totalPagesDonasi = (int) ceil($countDonasi / $perPage);
    
    $sedekahQuery = \App\Models\Infaq::where('jenis_transaksi', 'sedekah')->orderBy('tanggal', 'desc');
    $countSedekah = $sedekahQuery->count();
    $sedekahs = $sedekahQuery->skip(($sedekahPage - 1) * $perPage)->take($perPage)->get();
    $totalPagesSedekah = (int) ceil($countSedekah / $perPage);
    
    $pengeluaranQuery = \App\Models\Infaq::where('jenis_transaksi', 'pengeluaran')->orderBy('tanggal', 'desc');
    $countPengeluaran = $pengeluaranQuery->count();
    $pengeluarans = $pengeluaranQuery->skip(($pengeluaranPage - 1) * $perPage)->take($perPage)->get();
    $totalPagesPengeluaran = (int) ceil($countPengeluaran / $perPage);

    $totalInfaq = \App\Models\Infaq::where('jenis_transaksi', 'infaq')->sum('jumlah');
    $totalDonasi = \App\Models\Infaq::where('jenis_transaksi', 'donasi')->sum('jumlah');
    $totalSedekah = \App\Models\Infaq::where('jenis_transaksi', 'sedekah')->sum('jumlah');
    $totalPengeluaran = \App\Models\Infaq::where('jenis_transaksi', 'pengeluaran')->sum('jumlah');

    return view('infaq', compact(
        'informasiRekening', 
        'infaqs', 'donasis', 'sedekahs', 'pengeluarans', 
        'totalInfaq', 'totalDonasi', 'totalSedekah', 'totalPengeluaran', 
        'countInfaq', 'countDonasi', 'countSedekah', 'countPengeluaran',
        'infaqPage', 'donasiPage', 'sedekahPage', 'pengeluaranPage',
        'totalPagesInfaq', 'totalPagesDonasi', 'totalPagesSedekah', 'totalPagesPengeluaran',
        'selectedJenis', 'isFiltered'
    ));
})->name('infaq');


Route::get('/infaq-pengelola', function () {
    return view('infaq');
})->name('infaq-pengelola')->middleware('auth');

// Login Routes (only for guests - must not be authenticated)
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
});

// Logout (only for authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::middleware(['auth', \App\Http\Middleware\EnsureUserIsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Resource routes untuk CRUD
    Route::resource('profil-masjid', App\Http\Controllers\Admin\ProfilMasjidController::class);
    Route::resource('kegiatan-masjid', App\Http\Controllers\Admin\KegiatanMasjidController::class);
    Route::resource('artikel-masjid', App\Http\Controllers\Admin\ArtikelMasjidController::class);
    Route::resource('kajian-masjid', App\Http\Controllers\Admin\KajianMasjidController::class);
    Route::resource('konten-masjid', App\Http\Controllers\Admin\KontenMasjidController::class);
    Route::resource('kitab-masjid', App\Http\Controllers\Admin\KitabMasjidController::class);
    Route::resource('alquran-masjid', App\Http\Controllers\Admin\AlquranMasjidController::class);
    Route::resource('tpq', App\Http\Controllers\Admin\TpqController::class);
    Route::resource('mualaf', App\Http\Controllers\Admin\MualafController::class);
    Route::resource('infaq', App\Http\Controllers\Admin\InfaqController::class);
    Route::resource('informasi-rekening', App\Http\Controllers\Admin\InformasiRekeningController::class);

    // Redirect beranda ke dashboard
    Route::get('/beranda', function () {
        return redirect()->route('admin.dashboard');
    });
});

// Pengelola Keuangan Routes
Route::middleware(['auth', \App\Http\Middleware\EnsureUserIsPengelolaKeuangan::class])->prefix('pengelola-keuangan')->name('pengelola-keuangan.')->group(function () {
    Route::resource('infaq', App\Http\Controllers\PengelolaKeuangan\InfaqController::class);
    Route::resource('informasi-rekening', App\Http\Controllers\PengelolaKeuangan\InformasiRekeningController::class);
});

// Authenticated Routes (kept for backward compatibility)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->isKeuangan()) {
            return redirect()->route('pengelola-keuangan.infaq.index');
        }

        return redirect()->route('home');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
