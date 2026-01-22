<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArtikelMasjid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArtikelMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = ArtikelMasjid::query()->orderBy('tanggal', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%')
                    ->orWhere('penulis', 'like', '%' . $search . '%');
            });
        }

        $artikels = $query->get();

        return view('admin.artikel-masjid.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.artikel-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'penulis' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('artikel-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        ArtikelMasjid::create($validated);

        return redirect()->route('admin.artikel-masjid.index')
            ->with('success', 'Data artikel masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArtikelMasjid $artikelMasjid): View
    {
        return view('admin.artikel-masjid.show', compact('artikelMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArtikelMasjid $artikelMasjid): View
    {
        return view('admin.artikel-masjid.edit', compact('artikelMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArtikelMasjid $artikelMasjid): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'penulis' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($artikelMasjid->gambar) {
                Storage::disk('public')->delete($artikelMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('artikel-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $artikelMasjid->update($validated);

        return redirect()->route('admin.artikel-masjid.index')
            ->with('success', 'Data artikel masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArtikelMasjid $artikelMasjid): RedirectResponse
    {
        // Delete image if exists
        if ($artikelMasjid->gambar) {
            Storage::disk('public')->delete($artikelMasjid->gambar);
        }

        $artikelMasjid->delete();

        return redirect()->route('admin.artikel-masjid.index')
            ->with('success', 'Data artikel masjid berhasil dihapus.');
    }
}
