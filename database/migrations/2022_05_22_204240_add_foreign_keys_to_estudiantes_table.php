<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->foreign(['perfil_id'], 'estudiantes_ibfk_2')->references(['id'])->on('perfiles')->onUpdate('CASCADE');
            $table->foreign(['id'], 'estudiantes_ibfk_1')->references(['id'])->on('personas')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropForeign('estudiantes_ibfk_2');
            $table->dropForeign('estudiantes_ibfk_1');
        });
    }
}
