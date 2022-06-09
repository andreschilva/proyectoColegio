<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('perfil_id')->index('perfil_id');
            $table->integer('funcionalidad_id')->index('funcionalidad_id');
            $table->boolean('Permiso_mostrar')->nullable()->default(false);
            $table->boolean('Permiso_modificar')->nullable()->default(false);
            $table->boolean('Permiso_Eliminar')->nullable()->default(false);
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
        Schema::dropIfExists('permisos');
    }
}
