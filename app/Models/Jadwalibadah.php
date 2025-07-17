<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalibadah extends Model
{
    use HasFactory;
    protected $table = 'jadwalibadah';
    protected $fillable = ['nama_ibadah','waktu','lokasi','pemimpin','kategori']
}
