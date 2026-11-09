<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = ['nis', 'kelas'];

    public function inputAspirasis(): HasMany
    {
        return $this->hasMany(InputAspirasi::class, 'nis', 'nis');
    }
}