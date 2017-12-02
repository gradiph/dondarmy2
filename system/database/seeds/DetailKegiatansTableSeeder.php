<?php

use Illuminate\Database\Seeder;
use App\DetailKegiatan;

class DetailKegiatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailKegiatan::create([
            'donor_id' => '1',
            'kegiatan_id' => '1',
            'antrian' => 1,
            'panggil' => 'Sudah',
            'terima' => 'Tidak',
        ]);
    }
}
