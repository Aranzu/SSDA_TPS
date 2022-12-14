<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Manolo Sanchéz',
            'rut' => '105635677',
            'username' => 'Admin22',
            'email' => 'sorteotps2@gmail.com',
            'password' => 'Testtps2022',
            'cargo' => 'Administrador del sistema',
        ])->assignRole('Admin');
    }
}
