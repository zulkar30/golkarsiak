<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('kecamatan_id', 'fk_users_to_kecamatan')
            ->references('id')->on('kecamatan')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('desa_id', 'fk_users_to_desa')
            ->references('id')->on('desa')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('tps_id')->nullable();
            $table->foreign('tps_id', 'fk_users_to_tps')
            ->references('id')->on('tps')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('caleg_id')->nullable();
            $table->foreign('caleg_id', 'fk_users_to_caleg')
            ->references('id')->on('caleg')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_to_kecamatan');
            $table->dropForeign('fk_users_to_desa');
            $table->dropForeign('fk_users_to_tps');
            $table->dropForeign('fk_users_to_caleg');
        });
    }
};
