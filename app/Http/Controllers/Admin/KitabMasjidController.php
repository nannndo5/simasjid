<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KitabMasjid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KitabMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = KitabMasjid::query()->orderBy('created_at', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $kitabs = $query->get();

        return view('admin.kitab-masjid.index', compact('kitabs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.kitab-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kitab-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        KitabMasjid::create($validated);

        return redirect()->route('admin.kitab-masjid.index')
            ->with('success', 'Data kitab masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KitabMasjid $kitabMasjid): View
    {
        return view('admin.kitab-masjid.show', compact('kitabMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KitabMasjid $kitabMasjid): View
    {
        return view('admin.kitab-masjid.edit', compact('kitabMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KitabMasjid $kitabMasjid): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kitabMasjid->gambar) {
                Storage::disk('public')->delete($kitabMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kitab-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $kitabMasjid->update($validated);

        return redirect()->route('admin.kitab-masjid.index')
            ->with('success', 'Data kitab masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KitabMasjid $kitabMasjid): RedirectResponse
    {
        // Delete image if exists
        if ($kitabMasjid->gambar) {
            Storage::disk('public')->delete($kitabMasjid->gambar);
        }

        $kitabMasjid->delete();

        return redirect()->route('admin.kitab-masjid.index')
            ->with('success', 'Data kitab masjid berhasil dihapus.');
    }
}
