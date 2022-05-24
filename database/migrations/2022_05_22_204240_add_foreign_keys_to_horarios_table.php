<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->foreign(['Hora_id'], 'horarios_ibfk_2')->references(['id'])->on('horas')->onUpdate('CASCADE');
            $table->foreign(['grupo_materia_id'], 'horarios_ibfk_1')->references(['id'])->on('grupos_materias')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->dropForeign('horarios_ibfk_2');
            $table->dropForeign('horarios_ibfk_1');
        });
    }
}
