<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mobil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Admin::factory(5)->create();
        Mobil::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'Ahmad Jaenal',
            'email' => 'ahmadjaenal@gmail.com',
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'username' => 'Stefan',
            'email' => 'stefan@gmail.com',
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Admin::factory()->create([
            'username' => 'Admin001',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
