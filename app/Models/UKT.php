<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UKT extends Model
{
    protected $table = 'ukt';
    protected $fillable = [
        'nama_ukt',
        'periode',
        'jenis_ukt',
        'tanggal_mulai',
        'tanggal_akhir',
        'tempat_ukt',
        'informasi'
    ];
}
