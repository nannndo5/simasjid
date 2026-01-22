<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mualaf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MualafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Mualaf::query()->orderBy('created_at', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('deskripsi', 'like', '%' . $search . '%');
        }

        $mualafs = $query->get();

        return view('admin.mualaf.index', compact('mualafs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.mualaf.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('mualaf', 'public');
            $validated['gambar'] = $gambarPath;
        }

        Mualaf::create($validated);

        return redirect()->route('admin.mualaf.index')
            ->with('success', 'Data Mualaf berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mualaf $mualaf): View
    {
        return view('admin.mualaf.show', compact('mualaf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mualaf $mualaf): View
    {
        return view('admin.mualaf.edit', compact('mualaf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mualaf $mualaf): RedirectResponse
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($mualaf->gambar) {
                Storage::disk('public')->delete($mualaf->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('mualaf', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $mualaf->update($validated);

        return redirect()->route('admin.mualaf.index')
            ->with('success', 'Data Mualaf berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mualaf $mualaf): RedirectResponse
    {
        // Delete image if exists
        if ($mualaf->gambar) {
            Storage::disk('public')->delete($mualaf->gambar);
        }

        $mualaf->delete();

        return redirect()->route('admin.mualaf.index')
            ->with('success', 'Data Mualaf berhasil dihapus.');
    }
}
