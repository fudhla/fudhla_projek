<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'fudhla@example.com',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);

        // $this->call([
        //     WargaSeeder::class,
        //     AllSeeder::class,
        //     UserSeeder::class,
        //     Peminjaman::class,
        // ]);

    }
}
