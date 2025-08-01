<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $fillable = ['nama','sektor_id'];

    public function sektor()
    {
        return $this->belongsTo(Sektor::class);
    }
}
