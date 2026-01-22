<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlquranMasjid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AlquranMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = AlquranMasjid::query()->orderBy('created_at', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $alqurans = $query->get();

        return view('admin.alquran-masjid.index', compact('alqurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.alquran-masjid.create');
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
            $gambarPath = $gambar->store('alquran-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        AlquranMasjid::create($validated);

        return redirect()->route('admin.alquran-masjid.index')
            ->with('success', 'Data AL-Quran masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlquranMasjid $alquranMasjid): View
    {
        return view('admin.alquran-masjid.show', compact('alquranMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlquranMasjid $alquranMasjid): View
    {
        return view('admin.alquran-masjid.edit', compact('alquranMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlquranMasjid $alquranMasjid): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($alquranMasjid->gambar) {
                Storage::disk('public')->delete($alquranMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('alquran-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $alquranMasjid->update($validated);

        return redirect()->route('admin.alquran-masjid.index')
            ->with('success', 'Data AL-Quran masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlquranMasjid $alquranMasjid): RedirectResponse
    {
        // Delete image if exists
        if ($alquranMasjid->gambar) {
            Storage::disk('public')->delete($alquranMasjid->gambar);
        }

        $alquranMasjid->delete();

        return redirect()->route('admin.alquran-masjid.index')
            ->with('success', 'Data AL-Quran masjid berhasil dihapus.');
    }
}
