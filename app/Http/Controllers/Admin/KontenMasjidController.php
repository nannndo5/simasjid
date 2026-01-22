<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontenMasjid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KontenMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = KontenMasjid::query()->orderBy('tanggal', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $kontens = $query->get();

        return view('admin.konten-masjid.index', compact('kontens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.konten-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'link' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('konten-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        KontenMasjid::create($validated);

        return redirect()->route('admin.konten-masjid.index')
            ->with('success', 'Data konten masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KontenMasjid $kontenMasjid): View
    {
        return view('admin.konten-masjid.show', compact('kontenMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KontenMasjid $kontenMasjid): View
    {
        return view('admin.konten-masjid.edit', compact('kontenMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KontenMasjid $kontenMasjid): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'link' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kontenMasjid->gambar) {
                Storage::disk('public')->delete($kontenMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('konten-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $kontenMasjid->update($validated);

        return redirect()->route('admin.konten-masjid.index')
            ->with('success', 'Data konten masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KontenMasjid $kontenMasjid): RedirectResponse
    {
        // Delete image if exists
        if ($kontenMasjid->gambar) {
            Storage::disk('public')->delete($kontenMasjid->gambar);
        }

        $kontenMasjid->delete();

        return redirect()->route('admin.konten-masjid.index')
            ->with('success', 'Data konten masjid berhasil dihapus.');
    }
}
