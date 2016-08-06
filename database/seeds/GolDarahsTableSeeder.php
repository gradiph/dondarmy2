<?php

use Illuminate\Database\Seeder;
use App\GolDarah;

class GolDarahsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GolDarah::create([
            'nama' => 'A',
        ]);
        GolDarah::create([
            'nama' => 'A+',
        ]);
        GolDarah::create([
            'nama' => 'A-',
        ]);
        GolDarah::create([
            'nama' => 'AB',
        ]);
        GolDarah::create([
            'nama' => 'AB+',
        ]);
        GolDarah::create([
            'nama' => 'AB-',
        ]);
        GolDarah::create([
            'nama' => 'B',
        ]);
        GolDarah::create([
            'nama' => 'B+',
        ]);
        GolDarah::create([
            'nama' => 'B-',
        ]);
        GolDarah::create([
            'nama' => 'O',
        ]);
        GolDarah::create([
            'nama' => 'O+',
        ]);
        GolDarah::create([
            'nama' => 'O-',
        ]);
    }
}
