<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aspirasi extends Model
{
    protected $primaryKey = 'id_aspirasi';
    protected $fillable = ['id_pelaporan', 'status', 'id_kategori', 'feedback'];

    public function inputAspirasi(): BelongsTo
    {
        return $this->belongsTo(InputAspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}