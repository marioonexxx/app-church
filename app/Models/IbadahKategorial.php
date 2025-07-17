<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahKategorial extends Model
{
    use HasFactory;
    protected $table = 'ibadahkategorial';
    protected $fillable = ['nama','waktu','jam','tempat','pemimpin','kategori','sektor','unit'];
}
