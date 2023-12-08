<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = [
            [
                'dapil_id'      => 1,
                'nama_kecamatan'      => 'Siak',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_kecamatan'      => 'Sungai Apit',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_kecamatan'      => 'Minas',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 3,
                'nama_kecamatan'      => 'Tualang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_kecamatan'      => 'Sungai Muandau',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_kecamatan'      => 'Dayun',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_kecamatan'      => 'Kerinci Kanan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_kecamatan'      => 'Bungaraya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_kecamatan'      => 'Koto Gasip',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_kecamatan'      => 'Kandis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_kecamatan'      => 'Lubuk Dalam',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_kecamatan'      => 'Sabak Auh',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_kecamatan'      => 'Mempura',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_kecamatan'      => 'Pusako',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        Kecamatan::insert($kecamatan);
    }
}
