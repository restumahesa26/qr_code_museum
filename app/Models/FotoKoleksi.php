<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoKoleksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'koleksi_id', 'foto'
    ];
}
