<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->foreign(['perfil_id'], 'docentes_ibfk_2')->references(['id'])->on('perfiles')->onUpdate('CASCADE');
            $table->foreign(['id'], 'docentes_ibfk_1')->references(['id'])->on('personas')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropForeign('docentes_ibfk_2');
            $table->dropForeign('docentes_ibfk_1');
        });
    }
}
