<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerangkatGereja extends Model
{
    use HasFactory;
    protected $table = 'perangkatgereja';
    protected $fillable = ['nama_lengkap', 'foto_upload','jabatan_id', 'nama_jabatan', 'no_hp', 'url_facebook', 'url_instagram'];

    public function jabatan():BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id','id');
    }
}
