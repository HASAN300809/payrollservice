<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensis';

    protected $fillable = [
        'username',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
    ];
}
