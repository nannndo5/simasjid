<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KajianMasjid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KajianMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = KajianMasjid::query()->orderBy('tanggal', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('pemateri', 'like', '%' . $search . '%');
            });
        }

        $kajians = $query->get();

        return view('admin.kajian-masjid.index', compact('kajians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.kajian-masjid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penceramah' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
            'waktu' => 'nullable|date_format:H:i',
            'topik' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kajian-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        KajianMasjid::create($validated);

        return redirect()->route('admin.kajian-masjid.index')
            ->with('success', 'Data kajian masjid berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KajianMasjid $kajianMasjid): View
    {
        return view('admin.kajian-masjid.show', compact('kajianMasjid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KajianMasjid $kajianMasjid): View
    {
        return view('admin.kajian-masjid.edit', compact('kajianMasjid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KajianMasjid $kajianMasjid): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penceramah' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
            'waktu' => 'nullable|date_format:H:i',
            'topik' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($kajianMasjid->gambar) {
                Storage::disk('public')->delete($kajianMasjid->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('kajian-masjid', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $kajianMasjid->update($validated);

        return redirect()->route('admin.kajian-masjid.index')
            ->with('success', 'Data kajian masjid berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KajianMasjid $kajianMasjid): RedirectResponse
    {
        // Delete image if exists
        if ($kajianMasjid->gambar) {
            Storage::disk('public')->delete($kajianMasjid->gambar);
        }

        $kajianMasjid->delete();

        return redirect()->route('admin.kajian-masjid.index')
            ->with('success', 'Data kajian masjid berhasil dihapus.');
    }
}
