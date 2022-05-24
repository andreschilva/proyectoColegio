<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->foreign(['periodo_id'], 'notas_ibfk_2')->references(['id'])->on('periodos')->onUpdate('CASCADE');
            $table->foreign(['grupo_materia_id'], 'notas_ibfk_1')->references(['id'])->on('grupos_materias')->onUpdate('CASCADE');
            $table->foreign(['matricula_id'], 'notas_ibfk_3')->references(['id'])->on('matriculas')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->dropForeign('notas_ibfk_2');
            $table->dropForeign('notas_ibfk_1');
            $table->dropForeign('notas_ibfk_3');
        });
    }
}
