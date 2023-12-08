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
        Schema::table('caleg', function (Blueprint $table) {
            $table->foreignId('dapil_id', 'fk_caleg_to_dapil')
            ->references('id')->on('dapil')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caleg', function (Blueprint $table) {
            $table->dropForeign('fk_caleg_to_dapil');
        });
    }
};
