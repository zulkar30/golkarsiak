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
        Schema::table('paket_saksi', function (Blueprint $table) {
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->foreign('paket_id', 'fk_paket_saksi_to_paket')
            ->references('id')->on('paket')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('saksi_id', 'fk_paket_saksi_to_saksi')
            ->references('id')->on('saksi')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paket_saksi', function (Blueprint $table) {
            $table->dropForeign('fk_paket_saksi_to_paket');
            $table->dropForeign('fk_paket_saksi_to_saksi');
        });
    }
};
