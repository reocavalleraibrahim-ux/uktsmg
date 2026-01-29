<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeja extends Model
{
    protected $table = 'jeja';
    protected $fillable = [
        'id_dojang',
        'nama_jeja',
        'tempat_lahir',
        'tanggal_lahir',
        'tingkat',
        'no_registrasi',
        'foto'
    ];
}
