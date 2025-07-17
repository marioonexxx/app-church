<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renunganharian extends Model
{
    use HasFactory;
    protected $table = 'renunganharian';
    protected $fillable = ['judul','konten','tgl_post','user_id'];
}


