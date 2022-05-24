<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionalidades', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo', 50);
            $table->string('ruta', 50);
            $table->string('accion', 50)->nullable();
            $table->integer('orden')->nullable();
            $table->boolean('visible_menu')->nullable()->default(false);
            $table->integer('modulo_id')->index('modulo_id');
            $table->boolean('activo')->default(false);
            $table->boolean('eliminado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionalidades');
    }
}
