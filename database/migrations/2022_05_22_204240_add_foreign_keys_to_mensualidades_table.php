<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMensualidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->foreign(['matricula_id'], 'mensualidades_ibfk_1')->references(['id'])->on('matriculas')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensualidades', function (Blueprint $table) {
            $table->dropForeign('mensualidades_ibfk_1');
        });
    }
}
