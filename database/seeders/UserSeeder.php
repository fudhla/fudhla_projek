<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat user admin utama
        User::create([
            'name'     => 'Admin Utama',
            'email'    => 'admin@domain.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin', // pastikan kolom 'role' ada di tabel users
        ]);

        $this->command->info('User admin utama berhasil dibuat!');

        // 2. Buat 100 user faker biasa
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name'     => $faker->name(),
                'email'    => $faker->unique()->safeEmail(),
                'password' => Hash::make('password123'),
            ]);
        }

        $this->command->info('100 user faker berhasil dibuat!');
    }
}
