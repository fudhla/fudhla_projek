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

        // Ambil NAMA fasilitas (karena kolom di migration Anda adalah string 'fasilitas')
        $fasilitasNama = DB::table('fasilitas_umum')->pluck('nama')->toArray();
        $wargaIds      = DB::table('wargas')->pluck('id')->toArray();

        if (empty($fasilitasNama) || empty($wargaIds)) {
            dump("Seeder gagal: data fasilitas_umum atau wargas masih kosong!");
            return;
        }

        foreach (range(1, 120) as $i) {
            $tanggalMulai   = $faker->dateTimeBetween('-1 month', 'now');
            $tanggalSelesai = (clone $tanggalMulai)->modify('+' . rand(1, 3) . ' days');

            DB::table('peminjaman_fasilitas')->insert([
                // SESUAIKAN DENGAN MIGRATION ANDA:
                'fasilitas_id'       => $faker->randomElement($fasilitasNama), // Simpan nama, bukan ID
                'warga_id'        => $faker->randomElement($wargaIds),

                'tanggal_mulai'   => $tanggalMulai->format('Y-m-d'),
                'tanggal_selesai' => $tanggalSelesai->format('Y-m-d'),

                'tujuan'          => $faker->sentence(4),
                'total_biaya'     => $faker->numberBetween(0, 500000),
                // 'bukti_bayar' dihapus karena tidak ada di migration Anda
                'status'          => $faker->randomElement(['Pending', 'Disetujui', 'Ditolak']),

                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
