<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wartajemaat extends Model
{
    use HasFactory;
    protected $table = 'wartajemaat';
    protected $fillable = ['judul','files']; 
}

