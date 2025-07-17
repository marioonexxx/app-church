<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strukturmajelis extends Model
{
    use HasFactory;
    protected $table = 'strukturmajelis';
    protected $fillable = ['nama_lengkap','jabatan','no_hp','alamat','link_facebook','link_instagram','link_tiktok'];
}
