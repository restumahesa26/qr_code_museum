<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode', 'kategori_kode', 'nama'
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'kode', 'kategori_kode');
    }
}
