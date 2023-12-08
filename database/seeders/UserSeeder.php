<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'kecamatan_id'           => 1,
                'desa_id'           => 6,
                'tps_id'           => 75,
                'name'           => 'Zulkarnain',
                'email'          => 'korkab@gmail.com',
                'password'       => Hash::make('korkab@gmail.com'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]
        ];

        User::insert($user);
    }
}
