<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('login', 40)->nullable();
            $table->string('pass', 250)->nullable();
            $table->integer('perfil_id')->nullable()->index('perfil_id');
            $table->string('codigo_rude', 20);
            $table->enum('tipo', ['est'])->nullable()->default('est');
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
        Schema::dropIfExists('estudiantes');
    }
}
