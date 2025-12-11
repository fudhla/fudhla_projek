<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID'); // Faker Indonesia

        foreach (range(1, 120) as $index) {

            DB::table('wargas')->insert([
                'nik'           => $faker->unique()->numerify('################'), // 16 digit acak
                'nama'          => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat'        => $faker->address,
                'no_hp'         => $faker->phoneNumber,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
