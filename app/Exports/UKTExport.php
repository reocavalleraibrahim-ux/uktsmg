<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadSheet\Style\Fill;
use App\Models\Jeja;
use App\Models\Registrasi;
use App\Models\UKT;
use Illuminate\Support\Facades\DB;

class UKTExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithCustomStartCell,
    WithEvents,
    WithColumnWidths
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
        $this->data = UKT::where(['id' => $id])->first();
        $this->jumlah = UKT::Select('tingkat.tingkat_lanjut',DB::raw(' COUNT(registrasi.id) as jumlah'))->where(['ukt.id' => $id])->leftJoin('registrasi','registrasi.id_ukt','=','ukt.id')->leftJoin('jeja','registrasi.id_jeja','=','jeja.id')->leftJoin('tingkat','jeja.tingkat','=','tingkat.id')->groupBy('tingkat.tingkat_lanjut')->orderBy('tingkat.id','asc')->get();
    }

    public function columnWidths():array
    {
        return [
            'A' =>  5,
            'B' =>  25,
            'C' =>  25,
            'D' =>  15,
            'E' =>  18,
            'F' =>  10,
            'G' =>  35,
            'H' =>  15
        ];
    }

    public function startCell(): string
    {
        return 'A25';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;

                $sheet->getStyle('A10:H10')->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => 'FFF'
                        ]   
                    ]
                ]);

                $sheet->setCellValue('B1', 'REKAP DATA UKT');
                $sheet->setCellValue('B2',$this->data->jenis_ukt);
                $sheet->setCellValue('C2','Periode '.$this->data->periode);
                $sheet->setCellValue('B3','Tanggal Pelaksanaan');
            if($this->data->tanggal_mulai == $this->data->tanggal_akhir){
                $sheet->setCellValue('C3',date('d F Y',strtotime($this->data->tanggal_mulai)));
            }else{
                $sheet->setCellValue('C3',date('d F Y',strtotime($this->data->tanggal_mulai)).' - '.date('d F Y',strtotime($this->data->tanggal_akhir)));
            }
                $sheet->setCellValue('B4','Tempat Pelaksanaan');
                $sheet->setCellValue('C4',$this->data->tempat_ukt);
                $sheet->setCellValue('B5', 'Tanggal Cetak');
                $sheet->setCellValue('C5', now()->format('d F Y'));

                $sheet->setCellValue('B7','Rekap Informasi Hasil UKT');
                $sheet->setCellValue('C7','Jumlah Peserta');
                $sheet->setCellValue('D7','Biaya Per Peserta');
                $sheet->setCellValue('E7','Sub Total');
            $k = 8;
            $total = 0;
            $totalp = 0;
                foreach($this->jumlah as $j){
                    $sheet->setCellValue('B'.$k,$j->tingkat_lanjut);
                    $sheet->setCellValue('C'.$k,$j->jumlah);
                    $sheet->setCellValue('D'.$k,'Rp. 100.000');
                    $sheet->setCellValue('E'.$k,'Rp. '.number_format($j->jumlah * 100000));
                    $totalp = $totalp + $j->jumlah;
                    $total = $total + ($j->jumlah * 100000);
                $k++;
                }
                $sheet->setCellValue('B12','Total Peserta dan Biaya ke PBTI');
                $sheet->setCellValue('C12',$totalp);
                $sheet->setCellValue('E12','Rp. '.number_format($total));
            }
        ];
    }

    public function collection()
    {
        if(session('role') == 'admin'){
            return Jeja::select(
            'jeja.nama_jeja',
            'jeja.tempat_lahir',
            'jeja.tanggal_lahir',
            'jeja.no_registrasi',
            'tingkat.tingkat_lanjut',
            'jeja.alamat',
            'jeja.nohp'
            )
            ->leftJoin('registrasi', 'registrasi.id_jeja', '=', 'jeja.id')
            ->join('users', 'jeja.id_dojang', '=', 'users.id')
            ->join('tingkat', 'jeja.tingkat', '=', 'tingkat.id')
            ->where('registrasi.id_ukt', $this->id)
            ->get();
        }else{
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
            ->where(['registrasi.id_ukt' => $this->id,'jeja.id_dojang' => session('id')])
            ->get();
        }
        
    }

    public function map($data): array
    {
        $no = 1;
        return [
            $no,
            ucfirst($data->nama_jeja),
            ucfirst($data->tempat_lahir),
            date('d F Y', strtotime($data->tanggal_lahir)),
            $data->no_registrasi,
            $data->nama_tingkat,
            $data->alamat,
            $data->nohp,
        ];
        $no++;
    }

    public function headings(): array
    {
        return [
            'No',
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
