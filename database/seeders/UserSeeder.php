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
                'desa_id'           => 1,
                'tps_id'           => 1,
                'caleg_id'           => 1,
                'paket_id'           => 1,
                'name'           => 'Super Admin',
                'email'          => 'superadmin@gmail.com',
                'password'       => Hash::make('superadmin@gmail.com'),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
            ]
        ];

        User::insert($user);
    }
}
