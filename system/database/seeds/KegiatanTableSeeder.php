<?php

use Illuminate\Database\Seeder;
use App\Kegiatan;

class KegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kegiatan::create([
            'tgl' => '2015-06-21',
            'tempat' => 'test',
            'target_labu' => 120,
            'hasil_labu' => null,
            'path_laporan' => null,
        ]);
    }
}
