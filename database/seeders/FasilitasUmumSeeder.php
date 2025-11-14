<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasUmumSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $jenisList = ['Aula', 'Lapangan', 'Balai Desa', 'Ruang Pertemuan'];

        foreach (range(1, 10) as $i) {

            DB::table('fasilitas_umum')->insert([
                'nama'       => 'Fasilitas ' . $faker->word(),
                'jenis'      => $faker->randomElement($jenisList),
                'alamat'     => $faker->streetAddress,
                'rt'         => $faker->numerify('#'),
                'rw'         => $faker->numerify('#'),
                'kapasitas'  => $faker->numberBetween(20, 200),
                'deskripsi'  => $faker->sentence(10),
                'foto'       => 'default.jpg', // opsional, atau biarkan null
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
