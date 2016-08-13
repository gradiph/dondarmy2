<?php

use Illuminate\Database\Seeder;
use App\Pekerjaan;

class PekerjaansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pekerjaan::create([
            'nama' => 'TNI',
        ]);
        Pekerjaan::create([
            'nama' => 'POLRI',
        ]);
        Pekerjaan::create([
            'nama' => 'Mahasiswa / Pelajar',
        ]);
        Pekerjaan::create([
            'nama' => 'Swasta / Wiraswasta',
        ]);
        Pekerjaan::create([
            'nama' => 'PNS / BUMN',
        ]);
        Pekerjaan::create([
            'nama' => 'Lain-lain',
        ]);
    }
}
