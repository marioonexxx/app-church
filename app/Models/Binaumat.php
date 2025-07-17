<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binaumat extends Model
{
    use HasFactory;
    protected $table = 'binaumat';
    protected $fillable = ['nama','file_upload'];
}
