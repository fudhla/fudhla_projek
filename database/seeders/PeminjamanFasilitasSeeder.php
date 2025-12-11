<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID fasilitas & warga yang sudah ada
        $fasilitasIds = DB::table('fasilitas_umum')->pluck('fasilitas_id')->toArray();
        $wargaIds     = DB::table('wargas')->pluck('id')->toArray();

        if (empty($fasilitasIds) || empty($wargaIds)) {
            dump("Seeder gagal: fasilitas atau warga belum ada datanya!");
            return;
        }

        foreach (range(1, 120) as $i) {

            $tanggalMulai   = $faker->dateTimeBetween('-1 month', 'now');
            $tanggalSelesai = (clone $tanggalMulai)->modify('+' . rand(1, 3) . ' days');

            DB::table('peminjaman_fasilitas')->insert([
                'fasilitas_id'    => $faker->randomElement($fasilitasIds),
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
