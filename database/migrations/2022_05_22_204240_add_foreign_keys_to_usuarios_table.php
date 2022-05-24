<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign(['perfil_id'], 'usuarios_ibfk_2')->references(['id'])->on('perfiles')->onUpdate('CASCADE');
            $table->foreign(['id'], 'usuarios_ibfk_1')->references(['id'])->on('personas')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_ibfk_2');
            $table->dropForeign('usuarios_ibfk_1');
        });
    }
}
