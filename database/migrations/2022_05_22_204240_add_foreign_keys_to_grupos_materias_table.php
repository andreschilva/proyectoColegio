<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGruposMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos_materias', function (Blueprint $table) {
            $table->foreign(['materia_id'], 'grupos_materias_ibfk_2')->references(['id'])->on('materias')->onUpdate('CASCADE');
            $table->foreign(['docente_id'], 'grupos_materias_ibfk_1')->references(['id'])->on('docentes')->onUpdate('CASCADE');
            $table->foreign(['grupo_id'], 'grupos_materias_ibfk_3')->references(['id'])->on('grupos')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupos_materias', function (Blueprint $table) {
            $table->dropForeign('grupos_materias_ibfk_2');
            $table->dropForeign('grupos_materias_ibfk_1');
            $table->dropForeign('grupos_materias_ibfk_3');
        });
    }
}
