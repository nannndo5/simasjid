<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mualaf extends Model
{
    use HasFactory;

    protected $table = 'mualaf';

    protected $fillable = [
        'deskripsi',
        'gambar',
    ];
}
