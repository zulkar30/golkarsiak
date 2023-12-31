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
            21=> 4,
            22 => 4,
            23 => 4,
            24 => 44,
            25 => 11,
            26 => 19,
            27 => 11,
            28 => 6,
            29 => 96,
            30 => 50,
            31 => 11,
            32 => 12,
            33 => 30,
            34 => 15,
            35 => 10,
            36 => 79,
            37 => 13,
            38 => 4,
            39 => 1,
            40 => 5,
            41 => 4,
            42 => 5,
            43 => 4,
            44 => 2,
            45 => 2,
            46 => 4,
            47 => 24,
            48 => 11,
            49 => 7,
            50 => 4,
            51 => 4,
            52 => 8,
            53 => 8,
            54 => 5,
            55 => 3,
            56 => 16,
            57 => 10,
            58 => 7,
            59 => 6,
            60 => 7,
            61 => 4,
            62 => 6,
            63 => 8,
            64 => 9,
            65 => 8,
            66 => 4,
            67 => 4,
            68 => 9,
            69 => 3,
            70 => 17,
            71 => 14,
            72 => 13,
            73 => 10,
            74 => 10,
            75 => 12,
            76 => 5,
            77 => 4,
            78 => 4,
            79 => 3,
            80 => 14,
            81 => 8,
            82 => 2,
            83 => 5,
            84 => 10,
            85 => 4,
            86 => 5,
            87 => 7,
            88 => 7,
            89 => 2,
            90 => 5,
            91 => 24,
            92 => 23,
            93 => 38,
            94 => 20,
            95 => 22,
            96 => 23,
            97 => 15,
            98 => 11,
            99 => 7,
            100 => 8,
            101 => 20,
            102 => 21,
            103 => 7,
            104 => 7,
            105 => 9,
            106 => 7,
            107 => 7,
            108 => 5,
            109 => 5,
            110 => 7,
            111 => 4,
            112 => 9,
            113 => 4,
            114 => 6,
            115 => 4,
            116 => 4,
            117 => 12,
            118 => 6,
            119 => 6,
            120 => 7,
            121 => 11,
            122 => 2,
            123 => 8,
            124 => 3,
            125 => 3,
            126 => 4,
            127 => 5,
            128 => 5,
            129 => 3,
            130 => 4,
            131 => 2,
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
