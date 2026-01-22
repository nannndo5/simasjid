<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenMasjid extends Model
{
    use HasFactory;

    protected $table = 'konten_masjid';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'tanggal',
        'link',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }
}
