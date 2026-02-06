<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Jeja;
use App\Models\Registrasi;

class UKTExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return Jeja::select('jeja.nama_jeja','jeja.tempat_lahir','jeja.tanggal_lahir','jeja.no_registrasi','tingkat.nama_tingkat','jeja.alamat','jeja.nohp')->where(['registrasi.id_ukt' => $this->id])->join('users','jeja.id_dojang','=','users.id')->join('tingkat','jeja.tingkat','=','tingkat.id')->leftJoin('registrasi','registrasi.id_jeja','=','jeja.id')->get();
    }

    public function headings():array
    {
        return ['Nama','Tempat Lahir','Tanggal Lahir','Nomor Registrasi','Geup','Alamat','No Hp'];
    }
}
