<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasijemaat extends Model
{
    use HasFactory;
    protected $table = 'informasijemaat';
    protected $fillable = ['asal','tujuan','judul','konten'];
}
