<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use App\Models\Jeja;
use App\Models\Registrasi;

class UKTExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithCustomStartCell,
    WithEvents
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function startCell(): string
    {
        return 'A10';
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheet = $event->sheet;

                $sheet->setCellValue('A1', 'REKAP DATA UKT');
                $sheet->setCellValue('A2', 'Tanggal Cetak: ' . now()->format('d F Y'));
            }
        ];
    }

    public function collection()
    {
        return Jeja::select(
            'jeja.nama_jeja',
            'jeja.tempat_lahir',
            'jeja.tanggal_lahir',
            'jeja.no_registrasi',
            'tingkat.nama_tingkat',
            'jeja.alamat',
            'jeja.nohp'
        )
        ->leftJoin('registrasi', 'registrasi.id_jeja', '=', 'jeja.id')
        ->join('users', 'jeja.id_dojang', '=', 'users.id')
        ->join('tingkat', 'jeja.tingkat', '=', 'tingkat.id')
        ->where('registrasi.id_ukt', $this->id)
        ->get();
    }

    public function map($data): array
    {
        return [
            ucfirst($data->nama_jeja),
            ucfirst($data->tempat_lahir),
            date('d F Y', strtotime($data->tanggal_lahir)),
            $data->no_registrasi,
            $data->nama_tingkat,
            $data->alamat,
            $data->nohp,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Nomor Registrasi',
            'Geup',
            'Alamat',
            'No HP'
        ];
    }
}
