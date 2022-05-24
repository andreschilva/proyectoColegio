<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->foreign(['turno_id'], 'grupos_ibfk_2')->references(['id'])->on('turnos')->onUpdate('CASCADE');
            $table->foreign(['aula_id'], 'grupos_ibfk_4')->references(['id'])->on('aulas')->onUpdate('CASCADE');
            $table->foreign(['gestion_id'], 'grupos_ibfk_1')->references(['id'])->on('gestiones')->onUpdate('CASCADE');
            $table->foreign(['grado_id'], 'grupos_ibfk_3')->references(['id'])->on('grados')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign('grupos_ibfk_2');
            $table->dropForeign('grupos_ibfk_4');
            $table->dropForeign('grupos_ibfk_1');
            $table->dropForeign('grupos_ibfk_3');
        });
    }
}
