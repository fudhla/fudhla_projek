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

        foreach (range(1, 100) as $i) {

            DB::table('fasilitas_umum')->insert([
                'nama'       => $faker->company . ' ' . $faker->randomElement($jenisList),
                'jenis'      => $faker->randomElement($jenisList),
                'alamat'     => $faker->streetAddress,
                'rt'         => str_pad($faker->numberBetween(1, 9), 1, '0', STR_PAD_LEFT),
                'rw'         => str_pad($faker->numberBetween(1, 9), 1, '0', STR_PAD_LEFT),
                'kapasitas'  => $faker->numberBetween(20, 200),
                'deskripsi'  => $faker->paragraph(2), // deskripsi 2 paragraf bahasa Indonesia
                'foto'       => 'default.jpg', // opsional
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
