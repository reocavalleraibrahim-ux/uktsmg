<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'registrasi';
    protected $fillable = [
        'id_ukt',
        'id_jeja',
        'status',
    ];
}
