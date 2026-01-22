<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilMasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $profils = ProfilMasjid::orderBy('created_at', 'asc')->get();

        return view('admin.profil-masjid.index', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profil-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sejarah' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('profil-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        ProfilMasjid::create($validated);

        return redirect()->route('admin.profil-masjid.index')
            ->with('success', 'Data profil masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilMasjid $profilMasjid)
    {
        return view('admin.profil-masjid.show', compact('profilMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilMasjid $profilMasjid)
    {
        return view('admin.profil-masjid.edit', compact('profilMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfilMasjid $profilMasjid)
    {
        $validated = $request->validate([
            'sejarah' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($profilMasjid->gambar) {
                Storage::disk('public')->delete($profilMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('profil-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $profilMasjid->update($validated);

        return redirect()->route('admin.profil-masjid.index')
            ->with('success', 'Data profil masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilMasjid $profilMasjid)
    {
        // Delete image if exists
        if ($profilMasjid->gambar) {
            Storage::disk('public')->delete($profilMasjid->gambar);
        }

        $profilMasjid->delete();

        return redirect()->route('admin.profil-masjid.index')
            ->with('success', 'Data profil masjid berhasil dihapus.');
    }
}
