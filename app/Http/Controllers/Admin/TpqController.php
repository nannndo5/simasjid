<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tpq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TpqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Tpq::query()->orderBy('created_at', 'desc');

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('deskripsi', 'like', '%' . $search . '%');
        }

        $tpqs = $query->get();

        return view('admin.tpq.index', compact('tpqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.tpq.create');
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
            $gambarPath = $gambar->store('tpq', 'public');
            $validated['gambar'] = $gambarPath;
        }

        Tpq::create($validated);

        return redirect()->route('admin.tpq.index')
            ->with('success', 'Data TPQ berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tpq $tpq): View
    {
        return view('admin.tpq.show', compact('tpq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tpq $tpq): View
    {
        return view('admin.tpq.edit', compact('tpq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tpq $tpq): RedirectResponse
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($tpq->gambar) {
                Storage::disk('public')->delete($tpq->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('tpq', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $tpq->update($validated);

        return redirect()->route('admin.tpq.index')
            ->with('success', 'Data TPQ berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tpq $tpq): RedirectResponse
    {
        // Delete image if exists
        if ($tpq->gambar) {
            Storage::disk('public')->delete($tpq->gambar);
        }

        $tpq->delete();

        return redirect()->route('admin.tpq.index')
            ->with('success', 'Data TPQ berhasil dihapus.');
    }
}
