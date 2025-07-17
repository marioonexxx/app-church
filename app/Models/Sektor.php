<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    use HasFactory;
    protected $table = 'sektor';
    protected $fillable = ['nama'];


    public function unit()
    {
        return $this->hasMany(Unit::class);
    }
}
