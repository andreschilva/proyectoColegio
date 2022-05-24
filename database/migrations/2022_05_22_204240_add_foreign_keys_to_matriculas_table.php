<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->foreign(['grupo_id'], 'matriculas_ibfk_2')->references(['id'])->on('grupos')->onUpdate('CASCADE');
            $table->foreign(['estudiante_id'], 'matriculas_ibfk_1')->references(['id'])->on('estudiantes')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropForeign('matriculas_ibfk_2');
            $table->dropForeign('matriculas_ibfk_1');
        });
    }
}
