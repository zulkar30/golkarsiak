<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paket = [
            [
                'nama_paket'      => 'Drs.H. Syamsuar, M.Si (Caleg DPR-RI Dapil Riau 1)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_paket'      => 'Muhammad Andri,ST (Caleg DPRD Provinsi Riau Dapil Siak - Pelalawan)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        Paket::insert($paket);
    }
}
