<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 30);
            $table->string('nombre', 30);
            $table->integer('cupos');
            $table->integer('gestion_id')->index('gestion_id');
            $table->integer('turno_id')->index('turno_id');
            $table->integer('grado_id')->index('grado_id');
            $table->integer('aula_id')->index('aula_id');
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
        Schema::dropIfExists('grupos');
    }
}
