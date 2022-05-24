<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->foreign(['funcionalidad_id'], 'permisos_ibfk_2')->references(['id'])->on('funcionalidades')->onUpdate('CASCADE');
            $table->foreign(['perfil_id'], 'permisos_ibfk_1')->references(['id'])->on('perfiles')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->dropForeign('permisos_ibfk_2');
            $table->dropForeign('permisos_ibfk_1');
        });
    }
}
