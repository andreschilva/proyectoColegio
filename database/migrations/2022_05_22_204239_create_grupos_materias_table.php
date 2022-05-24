<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_materias', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('docente_id')->nullable()->index('docente_id');
            $table->integer('materia_id')->index('materia_id');
            $table->integer('grupo_id')->nullable()->index('grupo_id');
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
        Schema::dropIfExists('grupos_materias');
    }
}
