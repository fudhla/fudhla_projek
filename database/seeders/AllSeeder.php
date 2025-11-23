<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AllSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Faker Indonesia

        /** =========================
         *  SEEDER TABEL WARGAS (20)
         *  ========================= */
        foreach (range(1, 100) as $index) {
            DB::table('wargas')->insert([
                'nik'           => $faker->unique()->numerify('################'),
                'nama'          => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat'        => $faker->address,
                'no_hp'         => $faker->phoneNumber,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        /** ================================
         *  SEEDER PEMINJAMAN FASILITAS (20)
         *  ================================ */
        $wargaIds = DB::table('wargas')->pluck('id')->toArray();

        foreach (range(1, 100) as $i) {

            $tanggalMulai   = $faker->dateTimeBetween('-1 month', 'now');
            $tanggalSelesai = (clone $tanggalMulai)->modify('+' . rand(1, 3) . ' days');

            DB::table('peminjaman_fasilitas')->insert([
                'warga_id'        => $faker->randomElement($wargaIds),
                'tanggal_mulai'   => $tanggalMulai->format('Y-m-d'),
                'tanggal_selesai' => $tanggalSelesai->format('Y-m-d'),
                'tujuan'          => $faker->sentence(4),
                'total_biaya'     => $faker->numberBetween(0, 500000),
                'bukti_bayar'     => null,
                'status'          => $faker->randomElement(['pending', 'disetujui', 'ditolak']),
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
