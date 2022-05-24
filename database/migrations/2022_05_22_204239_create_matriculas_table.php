<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('fecha');
            $table->decimal('monto', 10)->nullable()->default(0);
            $table->integer('estudiante_id')->index('estudiante_id');
            $table->integer('grupo_id')->index('grupo_id');
            $table->string('observacion', 250)->nullable();
            $table->boolean('anulado')->default(false);
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
        Schema::dropIfExists('matriculas');
    }
}
