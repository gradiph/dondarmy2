<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'sadmin',
            'nama' => 'Super Admin',
            'password' => bcrypt('sadmin'),
            'role' => 'SuperAdmin',
        ]);
        User::create([
            'username' => 'admin',
            'nama' => 'Admin',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
        ]);
        User::create([
            'username' => 'panitia',
            'nama' => 'Panitia',
            'password' => bcrypt('panitia'),
            'role' => 'Panitia',
        ]);
    }
}
