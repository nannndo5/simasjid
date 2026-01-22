<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilMasjid;
use App\Models\KegiatanMasjid;
use App\Models\ArtikelMasjid;
use App\Models\KajianMasjid;
use App\Models\KontenMasjid;
use App\Models\KitabMasjid;
use App\Models\AlquranMasjid;
use App\Models\Tpq;
use App\Models\Mualaf;
use App\Models\Infaq;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'profil_masjid' => ProfilMasjid::count(),
            'kegiatan' => KegiatanMasjid::count(),
            'artikel' => ArtikelMasjid::count(),
            'kajian' => KajianMasjid::count(),
            'konten' => KontenMasjid::count(),
            'kitab' => KitabMasjid::count(),
            'alquran' => AlquranMasjid::count(),
            'tpq' => Tpq::count(),
            'mualaf' => Mualaf::count(),
            'total_infaq' => Infaq::sum('jumlah'),
            'total_transaksi' => Infaq::count(),
        ];

        $recentInfaqs = Infaq::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInfaqs'));
    }
}
