<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ArtikelMasjid extends Model
{
    use HasFactory;

    protected $table = 'artikel_masjid';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'penulis',
        'gambar',
        'kategori',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    /**
     * Generate slug from judul.
     */
    public function getSlugAttribute(): string
    {
        return Str::slug($this->judul) . '-' . $this->id;
    }

    /**
     * Get excerpt from deskripsi.
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit($this->deskripsi, 150);
    }
}
