<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahMinggu extends Model
{
    use HasFactory;
    protected $table = 'ibadahminggu';
    protected $fillable = ['konten'];
}
