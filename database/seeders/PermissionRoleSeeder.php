<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Korkab
        $all_permissions = Permission::all();

        $korkab = $all_permissions->filter(function($permission) {
            return substr($permission->name, 0, 11) != 'korcam_form' && substr($permission->name, 0, 11) != 'kordes_form' && substr($permission->name, 0, 11) != 'kortps_form' && substr($permission->name, 0, 12) != 'korcam_dapil' && substr($permission->name, 0, 12) != 'kordes_dapil' && substr($permission->name, 0, 12) != 'kortps_dapil' && substr($permission->name, 0, 6) != 'caleg_'  && substr($permission->name, 0, 6) != 'paket_';
        });
        Role::findOrFail(1)->permission()->sync($korkab->pluck('id'));

        // Korcam
        $korcam = $all_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'korkab_form' && substr($permission->name, 0, 11) != 'kordes_form' && substr($permission->name, 0, 11) != 'kortps_form' && substr($permission->name, 0, 9) != 'user_edit' && substr($permission->name, 0, 11) != 'user_delete' && substr($permission->name, 0, 12) != 'korkab_dapil' && substr($permission->name, 0, 12) != 'kordes_dapil' && substr($permission->name, 0, 12) != 'kortps_dapil' && substr($permission->name, 0, 6) != 'caleg_' && substr($permission->name, 0, 7) != 'master_'  && substr($permission->name, 0, 6) != 'paket_';
        });
        Role::findOrFail(2)->permission()->sync($korcam);

        // Kordes
        $kordes = $all_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'korkab_form' && substr($permission->name, 0, 11) != 'korcam_form' && substr($permission->name, 0, 11) != 'kortps_form' && substr($permission->name, 0, 9) != 'user_edit' && substr($permission->name, 0, 11) != 'user_delete' && substr($permission->name, 0, 12) != 'korcam_dapil' && substr($permission->name, 0, 12) != 'korkab_dapil' && substr($permission->name, 0, 12) != 'kortps_dapil' && substr($permission->name, 0, 6) != 'caleg_' && substr($permission->name, 0, 7) != 'master_'  && substr($permission->name, 0, 6) != 'paket_';
        });
        Role::findOrFail(3)->permission()->sync($kordes);

        // Kortps
        $kortps = $all_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'management_' && substr($permission->name, 0, 11) != 'korkab_form' && substr($permission->name, 0, 11) != 'korcam_form' && substr($permission->name, 0, 11) != 'kordes_form' && substr($permission->name, 0, 12) != 'korcam_dapil' && substr($permission->name, 0, 12) != 'korkab_dapil' && substr($permission->name, 0, 6) != 'caleg_' && substr($permission->name, 0, 7) != 'master_'  && substr($permission->name, 0, 6) != 'paket_';
        });
        Role::findOrFail(4)->permission()->sync($kortps);

        // Caleg
        $caleg = $all_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'management_' && substr($permission->name, 0, 7) != 'master_' && substr($permission->name, 0, 7) != 'content' && substr($permission->name, 0, 11) != 'operational' && substr($permission->name, 0, 3) != 'app'  && substr($permission->name, 0, 6) != 'paket_';
        });
        Role::findOrFail(5)->permission()->sync($caleg);

        // Paket
        $paket = $all_permissions->filter(function ($permission) {
            return substr($permission->name, 0, 11) != 'management_' && substr($permission->name, 0, 7) != 'master_' && substr($permission->name, 0, 7) != 'content' && substr($permission->name, 0, 11) != 'operational' && substr($permission->name, 0, 3) != 'app'  && substr($permission->name, 0, 6) != 'caleg_';
        });
        Role::findOrFail(6)->permission()->sync($paket);
    }
}
