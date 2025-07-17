<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shk extends Model
{
    use HasFactory;
    protected $table = 'shk';
    protected $fillable = ['nama','file_upload'];

}
