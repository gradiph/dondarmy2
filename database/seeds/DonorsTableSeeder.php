<?php

use Illuminate\Database\Seeder;
use App\Donor;

class DonorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donor::create([
            'no_register' => '3274031505950',
            'nama' => 'Gradiyanto Putera Husein',
            'gol_darah_id' => '2',
            'kelamin' => 'Pria',
            'tempat_lahir' => 'Cirebon',
            'tgl_lahir' => '1995-05-15',
            'telp' => '08886263895',
            'alamat' => 'Jalan Angkasa No. 26 Cirebon',
            'rt' => '001',
            'rw' => '010',
            'kelurahan' => 'Harjamukti',
            'kecamatan' => 'Harjamukti',
            'kode_pos' => '45143',
            'pekerjaan_id' => '3',
            'penghargaan' => null,
            'total_donor' => null,
            'donor_terakhir' => null,
        ]);
    }
}
