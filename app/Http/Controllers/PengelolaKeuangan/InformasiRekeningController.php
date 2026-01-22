<?php

namespace App\Http\Controllers\PengelolaKeuangan;

use App\Http\Controllers\Controller;
use App\Models\InformasiRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekenings = InformasiRekening::orderBy('created_at', 'desc')->paginate(10);

        return view('pengelola-keuangan.informasi-rekening.index', compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengelola-keuangan.informasi-rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_bank_1' => 'nullable|string|max:100',
            'no_rekening_1' => 'nullable|string|max:50',
            'nama_bank_2' => 'nullable|string|max:100',
            'no_rekening_2' => 'nullable|string|max:50',
            'nama_bank_3' => 'nullable|string|max:100',
            'no_rekening_3' => 'nullable|string|max:50',
            'no_whatsapp' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('informasi-rekening', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        InformasiRekening::create($validated);

        return redirect()->route('pengelola-keuangan.informasi-rekening.index')
            ->with('success', 'Informasi rekening berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InformasiRekening $informasiRekening)
    {
        return view('pengelola-keuangan.informasi-rekening.show', compact('informasiRekening'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformasiRekening $informasiRekening)
    {
        return view('pengelola-keuangan.informasi-rekening.edit', compact('informasiRekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformasiRekening $informasiRekening)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_bank_1' => 'nullable|string|max:100',
            'no_rekening_1' => 'nullable|string|max:50',
            'nama_bank_2' => 'nullable|string|max:100',
            'no_rekening_2' => 'nullable|string|max:50',
            'nama_bank_3' => 'nullable|string|max:100',
            'no_rekening_3' => 'nullable|string|max:50',
            'no_whatsapp' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($informasiRekening->gambar) {
                Storage::disk('public')->delete($informasiRekening->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('informasi-rekening', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $informasiRekening->update($validated);

        return redirect()->route('pengelola-keuangan.informasi-rekening.index')
            ->with('success', 'Informasi rekening berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformasiRekening $informasiRekening)
    {
        // Delete image if exists
        if ($informasiRekening->gambar) {
            Storage::disk('public')->delete($informasiRekening->gambar);
        }

        $informasiRekening->delete();

        return redirect()->route('pengelola-keuangan.informasi-rekening.index')
            ->with('success', 'Informasi rekening berhasil dihapus.');
    }
}
