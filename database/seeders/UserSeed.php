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
            'name' => 'ManoloG',
            'rut' => '123232-2',
            'username' => 'ManoloGod',
            'email' => 'ManoloGodd@gmail.com',
            'password' => '12345678', // 12345678
            'cargo' => 'Administrador del sistema',
        ])->assignRole('Admin');
    }
}