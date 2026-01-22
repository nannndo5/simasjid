<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KegiatanMasjid extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_masjid';

    protected $fillable = [
        'judul',
        'tanggal',
        'waktu',
        'deskripsi',
        'lokasi',
        'gambar',
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
}
