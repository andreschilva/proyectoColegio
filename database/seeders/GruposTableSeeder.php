<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('grupos')->delete();
        
        \DB::table('grupos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'codigo' => '1A',
                'nombre' => 'Primero A',
                'cupos' => 30,
                'gestion_id' => 1,
                'turno_id' => 1,
                'grado_id' => 3,
                'aula_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'codigo' => '2A',
                'nombre' => 'Segundo A',
                'cupos' => 30,
                'gestion_id' => 1,
                'turno_id' => 1,
                'grado_id' => 4,
                'aula_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'codigo' => '3A',
                'nombre' => 'Tercero A',
                'cupos' => 30,
                'gestion_id' => 1,
                'turno_id' => 1,
                'grado_id' => 5,
                'aula_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'codigo' => '1A',
                'nombre' => 'Primero A',
                'cupos' => 30,
                'gestion_id' => 2,
                'turno_id' => 1,
                'grado_id' => 3,
                'aula_id' => 2,
                'activo' => 1,
                'eliminado' => 0,
     
            ),
            4 => 
            array (
                'id' => 5,
                'codigo' => '2A',
                'nombre' => 'Segundo A',
                'cupos' => 30,
                'gestion_id' => 2,
                'turno_id' => 1,
                'grado_id' => 4,
                'aula_id' => 2,
                'activo' => 1,
                'eliminado' => 0,
 
            ),
            5 => 
            array (
                'id' => 6,
                'codigo' => '3A',
                'nombre' => 'Tercero A',
                'cupos' => 30,
                'gestion_id' => 2,
                'turno_id' => 1,
                'grado_id' => 5,
                'aula_id' => 2,
                'activo' => 1,
                'eliminado' => 0,
 
            ),
            6 => 
            array (
                'id' => 7,
                'codigo' => '4A',
                'nombre' => 'Cuarto A',
                'cupos' => 30,
                'gestion_id' => 2,
                'turno_id' => 1,
                'grado_id' => 6,
                'aula_id' => 2,
                'activo' => 1,
                'eliminado' => 0,
     
            ),
        ));
        
        
    }
}