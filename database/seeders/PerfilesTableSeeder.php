<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perfiles')->delete();
        
        \DB::table('perfiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Estudiante',
                'es_especial' => 1,
                'activo' => 1,
                'eliminado' => 0,
   
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Docente',
                'es_especial' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Administrador',
                'es_especial' => 0,
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Secretaria',
                'es_especial' => 0,
                'activo' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Cajero',
                'es_especial' => 0,
                'activo' => 1,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Contador',
                'es_especial' => 0,
                'activo' => 1,
                'eliminado' => 0,
            ),

            6 => 
            array (
                'id' => 7,
                'nombre' => 'SupAdmin',
                'es_especial' => 1,
                'activo' => 1,
                'eliminado' => 0,
            ),
            

        ));
        
        
    }
}