<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombres', 100);
            $table->string('primer_apellido', 100)->nullable();
            $table->string('segundo_apellido', 100)->nullable();
            $table->string('genero', 1)->nullable();
            $table->string('ci', 30)->nullable();
            $table->string('ci_exp', 10)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('celular', 30)->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->string('correo', 100)->nullable();
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
        Schema::dropIfExists('personas');
    }
}
