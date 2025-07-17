<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotogallery extends Model
{
    use HasFactory;
    protected $table = 'fotogallery';
    protected $fillable = ['caption','foto_upload'];
}
