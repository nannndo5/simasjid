<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infaq;
use App\Models\InformasiRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Infaq::query();

        // Search (hanya untuk keterangan)
        if ($request->has('search') && $request->search) {
            $query->where('keterangan', 'like', '%' . $request->search . '%');
        }

        // Filter by jenis_transaksi
        if ($request->has('jenis_transaksi') && $request->jenis_transaksi) {
            $query->where('jenis_transaksi', $request->jenis_transaksi);
        }

        // Filter by date
        if ($request->has('tanggal') && $request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter by month
        if ($request->has('bulan') && $request->bulan) {
            $query->whereYear('tanggal', date('Y', strtotime($request->bulan)))
                ->whereMonth('tanggal', date('m', strtotime($request->bulan)));
        }

        // Filter by kategori
        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        // Total pemasukan
        $totalPemasukan = (clone $query)->sum('jumlah');

        // Sorting
        $sortBy = $request->get('sort_by', 'tanggal');
        $sortDir = $request->get('sort_dir', 'desc');
        $query->orderBy($sortBy, $sortDir);

        $infaqs = $query->paginate(10)->withQueryString();
        $rekenings = InformasiRekening::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.infaq.index', compact('infaqs', 'totalPemasukan', 'rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.infaq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'jenis_transaksi' => 'required|in:infaq,sedekah,donasi,pengeluaran',
            'kategori' => 'nullable|in:uang masuk,uang keluar',
            'keterangan' => 'nullable|string|max:500',
        ]);

        Infaq::create($validated);

        return redirect()->route('admin.infaq.index')
            ->with('success', 'Data infaq berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Infaq $infaq)
    {
        return view('admin.infaq.show', compact('infaq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infaq $infaq)
    {
        return view('admin.infaq.edit', compact('infaq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infaq $infaq)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'jenis_transaksi' => 'required|in:infaq,sedekah,donasi,pengeluaran',
            'kategori' => 'nullable|in:uang masuk,uang keluar',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $infaq->update($validated);

        return redirect()->route('admin.infaq.index')
            ->with('success', 'Data infaq berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infaq $infaq)
    {
        $infaq->delete();

        return redirect()->route('admin.infaq.index')
            ->with('success', 'Data infaq berhasil dihapus.');
    }
}
