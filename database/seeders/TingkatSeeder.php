<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tingkat')->insert([
            [
                'nama_tingkat'  =>  'Geup 10',
                'warna'         =>  'Putih',
                'tingkat_lanjut'=>  'Geup 9'
            ],
            [
                'nama_tingkat'  =>  'Geup 9',
                'warna'         =>  'Kuning',
                'tingkat_lanjut'=>  'Geup 8'
            ],
            [
                'nama_tingkat'  =>  'Geup 8',
                'warna'         =>  'Kuning-Hijau',
                'tingkat_lanjut'=>  'Geup 7'
            ],
            [
                'nama_tingkat'  =>  'Geup 7',
                'warna'         =>  'Hijau',
                'tingkat_lanjut'=>  'Geup 6'
            ],
            [
                'nama_tingkat'  =>  'Geup 6',
                'warna'         =>  'Hijau-Biru',
                'tingkat_lanjut'=>  'Geup 5'
            ],
            [
                'nama_tingkat'  =>  'Geup 5',
                'warna'         =>  'Biru',
                'tingkat_lanjut'=>  'Geup 4'
            ],
            [
                'nama_tingkat'  =>  'Geup 4',
                'warna'         =>  'Biru-Merah',
                'tingkat_lanjut'=>  'Geup 3'
            ],
            [
                'nama_tingkat'  =>  'Geup 3',
                'warna'         =>  'Merah',
                'tingkat_lanjut'=>  'Geup 2'
            ],
            [
                'nama_tingkat'  =>  'Geup 2',
                'warna'         =>  'Merah-1',
                'tingkat_lanjut'=>  'Geup 1'
            ],
            [
                'nama_tingkat'  =>  'Geup 1',
                'warna'         =>  'Merah-2',
                'tingkat_lanjut'=>  'Dan 1'
            ],
            [
                'nama_tingkat'  =>  'Dan 1',
                'warna'         =>  'Hitam-1',
                'tingkat_lanjut'=>  'Dan 2'
            ],
            [
                'nama_tingkat'  =>  'Dan 2',
                'warna'         =>  'Hitam-2',
                'tingkat_lanjut'=>  'Dan 3'
            ],
            [
                'nama_tingkat'  =>  'Dan 3',
                'warna'         =>  'Hitam-3',
                'tingkat_lanjut'=>  'Dan 4'
            ],
            [
                'nama_tingkat'  =>  'Dan 4',
                'warna'         =>  'Hitam-4',
                'tingkat_lanjut'=>  'Dan 5'
            ],
            [
                'nama_tingkat'  =>  'Dan 5',
                'warna'         =>  'Hitam-5',
                'tingkat_lanjut'=>  'Dan 6'
            ],
            [
                'nama_tingkat'  =>  'Dan 6',
                'warna'         =>  'Hitam-6',
                'tingkat_lanjut'=>  'Dan 7'
            ],
            [
                'nama_tingkat'  =>  'Dan 7',
                'warna'         =>  'Hitam-7',
                'tingkat_lanjut'=>  'Dan 8'
            ],
            [
                'nama_tingkat'  =>  'Dan 8',
                'warna'         =>  'Hitam-8',
                'tingkat_lanjut'=>  'Dan 9'
            ],
        ]);
    }
}
