<?php

namespace Database\Seeders;

use App\Models\Tps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desa_tps_data = [];
        $desa_data = [
            1 => 24,
            2 => 24,
            3 => 9,
            4 => 10,
            5 => 6,
            6 => 4,
            7 => 7,
            8 => 7,
            9 => 22,
            10 => 4,
            11 => 4,
            12 => 6,
            13 => 12,
            14 => 8,
            15 => 5,
            16 => 10,
            17 => 3,
            18 => 6,
            19 => 6,
            20 => 4,
            21 => 4,
            22 => 4,
            23 => 44,
            24 => 11,
            25 => 19,
            26 => 11,
            27 => 6,
            28 => 96,
            29 => 50,
            30 => 11,
            31 => 12,
            32 => 30,
            33 => 15,
            34 => 10,
            35 => 79,
            36 => 13,
            37 => 4,
            38 => 1,
            39 => 5,
            40 => 4,
            41 => 5,
            42 => 4,
            43 => 2,
            44 => 2,
            45 => 4,
            46 => 24,
            47 => 11,
            48 => 7,
            49 => 4,
            50 => 8,
            51 => 8,
            52 => 5,
            53 => 3,
            54 => 16,
            55 => 10,
            56 => 7,
            57 => 6,
            58 => 7,
            59 => 4,
            60 => 6,
            61 => 8,
            62 => 9,
            63 => 8,
            64 => 4,
            65 => 4,
            66 => 9,
            67 => 3,
            68 => 17,
            69 => 14,
            70 => 13,
            71 => 10,
            72 => 10,
            73 => 12,
            74 => 5,
            75 => 4,
            76 => 4,
            77 => 3,
            78 => 14,
            79 => 8,
            80 => 2,
            81 => 5,
            82 => 10,
            83 => 4,
            84 => 5,
            85 => 7,
            86 => 7,
            87 => 2,
            88 => 5,
            89 => 24,
            90 => 23,
            91 => 38,
            92 => 20,
            93 => 22,
            94 => 23,
            95 => 15,
            96 => 11,
            97 => 7,
            98 => 8,
            99 => 20,
            100 => 21,
            101 => 7,
            102 => 7,
            103 => 9,
            104 => 7,
            105 => 7,
            106 => 5,
            107 => 5,
            108 => 7,
            109 => 4,
            110 => 9,
            111 => 4,
            112 => 6,
            113 => 4,
            114 => 4,
            115 => 12,
            116 => 6,
            117 => 6,
            118 => 7,
            119 => 11,
            120 => 2,
            121 => 8,
            122 => 3,
            123 => 3,
            124 => 4,
            125 => 5,
            126 => 5,
            127 => 3,
            128 => 4,
            129 => 2,
        ];
        foreach ($desa_data as $desa_id => $tps_count) {
            for ($i = 1; $i <= $tps_count; $i++) {
                $desa_tps_data[] = [
                    'desa_id'    => $desa_id,
                    'nama_tps'   => "TPS $i",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        Tps::insert($desa_tps_data);
    }
}