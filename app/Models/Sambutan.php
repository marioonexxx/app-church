<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    use HasFactory;
    protected $table = 'sambutan';
    protected $fillable = ['judul','konten','link_youtube'];
}
