<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InputAspirasi extends Model
{
    protected $primaryKey = 'id_pelaporan';
    protected $fillable = ['nis', 'id_kategori', 'lokasi', 'ket'];

    protected static function booted(): void
    {
        // setiap laporan baru otomatis membuat data aspirasi berstatus Menunggu
        static::created(function (InputAspirasi $input) {
            Aspirasi::create([
                'id_pelaporan' => $input->id_pelaporan,
                'id_kategori' => $input->id_kategori,
            ]);
        });
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function aspirasi(): HasOne
    {
        return $this->hasOne(Aspirasi::class, 'id_pelaporan', 'id_pelaporan');
    }
}