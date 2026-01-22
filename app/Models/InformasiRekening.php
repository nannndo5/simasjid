<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiRekening extends Model
{
    /** @use HasFactory<\Database\Factories\InformasiRekeningFactory> */
    use HasFactory;

    protected $table = 'informasi_rekening';

    protected $fillable = [
        'gambar',
        'nama_bank_1',
        'no_rekening_1',
        'nama_bank_2',
        'no_rekening_2',
        'nama_bank_3',
        'no_rekening_3',
        'no_whatsapp',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
