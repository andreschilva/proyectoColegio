<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modulos')->delete();

        $modulo = new Modulo();
        $modulo->id = 1;
        $modulo->titulo ='Seguridad';
        $modulo->codigo = 'seguridad';
        $modulo->icono = 'fa-th-large';
        $modulo->orden = 1;
        $modulo->activo = 1;
        $modulo->eliminado = 0;
        $modulo->save();

        $modulo = new Modulo();
        $modulo->id = 2;
        $modulo->titulo ='Academico';
        $modulo->codigo = 'academico';
        $modulo->icono = 'fa-table';
        $modulo->orden = 2;
        $modulo->activo = 1;
        $modulo->eliminado = 0;
        $modulo->save();
        
        $modulo = new Modulo();
        $modulo->id = 3;
        $modulo->titulo ='Inscripcion';
        $modulo->codigo = 'inscripcion';
        $modulo->icono = 'fa-edit';
        $modulo->orden = 3;
        $modulo->activo = 1;
        $modulo->eliminado = 0;
        $modulo->save();

        $modulo = new Modulo();
        $modulo->id = 4;
        $modulo->titulo ='Informes';
        $modulo->codigo = 'informes';
        $modulo->icono = 'fa-bar-chart-o';
        $modulo->orden = 4;
        $modulo->activo = 1;
        $modulo->eliminado = 0;
        $modulo->save();
       
        
    }
}