<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    protected $table = 'infaq';

    protected $fillable = [
        'tanggal',
        'jumlah',
        'jenis_transaksi',
        'keterangan',
        'kategori',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'jumlah' => 'decimal:2',
        ];
    }

    public function getFormattedJumlahAttribute(): string
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }
}
