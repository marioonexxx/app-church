<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videogallery extends Model
{
    use HasFactory;
    protected $table = 'videogallery';
    protected $fillable = ['caption','link_video'];
}
