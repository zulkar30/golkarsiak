<?php

namespace Database\Seeders;

use App\Models\Caleg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caleg = [
            [
                'dapil_id'      => 1,
                'nama_caleg'      => 'Indra Gunawan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_caleg'      => 'Sujarwo',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 1,
                'nama_caleg'      => 'Wan Hamzah',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_caleg'      => 'Tarmijan, SM',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_caleg'      => 'Samijo, SP',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_caleg'      => 'Indah Rosmiati',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 2,
                'nama_caleg'      => 'Soma Imam Nuryadi, SE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 3,
                'nama_caleg'      => 'Asril',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 3,
                'nama_caleg'      => 'Unggal Gultom',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 3,
                'nama_caleg'      => 'Zulkifli, S.Sos,. M.Si',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_caleg'      => 'Hot Selamat Tua Junianton Sijabat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_caleg'      => 'Ternando Simangunsong',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_caleg'      => 'Jumadi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'dapil_id'      => 4,
                'nama_caleg'      => 'Jondris Pakpahan, SH',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        Caleg::insert($caleg);
    }
}
