<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GolDarahsTableSeeder::class);
        $this->call(PekerjaansTableSeeder::class);
        $this->call(DonorsTableSeeder::class);
        $this->call(KegiatanTableSeeder::class);
        $this->call(DetailKegiatansTableSeeder::class);
    }
}
