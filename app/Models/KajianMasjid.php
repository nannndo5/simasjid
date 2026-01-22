<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianMasjid extends Model
{
    use HasFactory;

    protected $table = 'kajian_masjid';

    protected $fillable = [
        'judul',
        'penceramah',
        'tanggal',
        'waktu',
        'topik',
        'deskripsi',
        'gambar',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }
}
