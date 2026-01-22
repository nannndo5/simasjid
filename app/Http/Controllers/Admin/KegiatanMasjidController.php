<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = KegiatanMasjid::query()->orderBy('tanggal', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }

        $kegiatans = $query->get();

        return view('admin.kegiatan-masjid.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kegiatan-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        KegiatanMasjid::create($validated);

        return redirect()->route('admin.kegiatan-masjid.index')
            ->with('success', 'Data kegiatan masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KegiatanMasjid $kegiatanMasjid)
    {
        return view('admin.kegiatan-masjid.show', compact('kegiatanMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KegiatanMasjid $kegiatanMasjid)
    {
        return view('admin.kegiatan-masjid.edit', compact('kegiatanMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KegiatanMasjid $kegiatanMasjid)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kegiatanMasjid->gambar) {
                Storage::disk('public')->delete($kegiatanMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kegiatan-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $kegiatanMasjid->update($validated);

        return redirect()->route('admin.kegiatan-masjid.index')
            ->with('success', 'Data kegiatan masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KegiatanMasjid $kegiatanMasjid)
    {
        // Delete image if exists
        if ($kegiatanMasjid->gambar) {
            Storage::disk('public')->delete($kegiatanMasjid->gambar);
        }

        $kegiatanMasjid->delete();

        return redirect()->route('admin.kegiatan-masjid.index')
            ->with('success', 'Data kegiatan masjid berhasil dihapus.');
    }
}
