<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;
    protected $table = 'jemaat';
    protected $fillable = ['nama','nama_kepala_keluarga','status_dalam_keluarga','tempat_lahir','tgl_lahir','kelamin','sektor','unit'];
}
