<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GruposMateriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('grupos_materias')->delete();
        
        \DB::table('grupos_materias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'docente_id' => NULL,
                'materia_id' => 1,
                'grupo_id' => 1,
                'activo' => 0,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'docente_id' => NULL,
                'materia_id' => 2,
                'grupo_id' => 1,
                'activo' => 0,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'docente_id' => NULL,
                'materia_id' => 3,
                'grupo_id' => 1,
                'activo' => 0,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'docente_id' => NULL,
                'materia_id' => 4,
                'grupo_id' => 1,
                'activo' => 0,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'docente_id' => NULL,
                'materia_id' => 1,
                'grupo_id' => 2,
                'activo' => 0,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'docente_id' => NULL,
                'materia_id' => 2,
                'grupo_id' => 2,
                'activo' => 0,
                'eliminado' => 0,

            ),
            6 => 
            array (
                'id' => 7,
                'docente_id' => NULL,
                'materia_id' => 3,
                'grupo_id' => 2,
                'activo' => 0,
                'eliminado' => 0,
 
            ),
            7 => 
            array (
                'id' => 8,
                'docente_id' => NULL,
                'materia_id' => 4,
                'grupo_id' => 2,
                'activo' => 0,
                'eliminado' => 0,
 
            ),
            8 => 
            array (
                'id' => 9,
                'docente_id' => NULL,
                'materia_id' => 1,
                'grupo_id' => 3,
                'activo' => 0,
                'eliminado' => 0,

            ),
            9 => 
            array (
                'id' => 10,
                'docente_id' => NULL,
                'materia_id' => 2,
                'grupo_id' => 3,
                'activo' => 0,
                'eliminado' => 0,
         
            ),
            10 => 
            array (
                'id' => 11,
                'docente_id' => NULL,
                'materia_id' => 3,
                'grupo_id' => 3,
                'activo' => 0,
                'eliminado' => 0,
         
            ),
            11 => 
            array (
                'id' => 12,
                'docente_id' => NULL,
                'materia_id' => 4,
                'grupo_id' => 3,
                'activo' => 0,
                'eliminado' => 0,
       
            ),
        ));
        
        
    }
}