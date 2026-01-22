<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AlquranMasjid extends Model
{
    use HasFactory;

    protected $table = 'alquran_masjid';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];

    /**
     * Generate slug from judul.
     */
    public function getSlugAttribute(): string
    {
        return Str::slug($this->judul ?? 'alquran') . '-' . $this->id;
    }

    /**
     * Get excerpt from deskripsi.
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit($this->deskripsi ?? '', 150);
    }
}
