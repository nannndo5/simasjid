<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KitabMasjid extends Model
{
    use HasFactory;

    protected $table = 'kitab_masjid';

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
        return Str::slug($this->judul ?? 'kitab') . '-' . $this->id;
    }

    /**
     * Get excerpt from deskripsi.
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit($this->deskripsi ?? '', 150);
    }
}
