<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jeja extends Model
{
    use SoftDeletes;
    
    protected $table = 'jeja';
    protected $fillable = [
        'id_dojang',
        'nama_jeja',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nohp',
        'jkel',
        'tingkat',
        'no_registrasi',
        'foto',
        'id_tcon'
    ];
}
