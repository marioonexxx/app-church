<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blogpost extends Model
{
    use HasFactory;
    protected $table = 'blogpost';
    protected $fillable = ['judul','slug','image','konten','meta_title','meta_description','meta_keywords','kategori_id','user_id'];


    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kategori():BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
