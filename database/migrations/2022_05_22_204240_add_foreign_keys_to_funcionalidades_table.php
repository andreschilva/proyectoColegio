<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFuncionalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionalidades', function (Blueprint $table) {
            $table->foreign(['modulo_id'], 'funcionalidades_ibfk_1')->references(['id'])->on('modulos')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionalidades', function (Blueprint $table) {
            $table->dropForeign('funcionalidades_ibfk_1');
        });
    }
}
