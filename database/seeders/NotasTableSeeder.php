<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notas')->delete();
        
        \DB::table('notas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'valor' => '82.00',
                'grupo_materia_id' => 1,
                'periodo_id' => 1,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'valor' => '93.00',
                'grupo_materia_id' => 1,
                'periodo_id' => 2,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'valor' => '86.00',
                'grupo_materia_id' => 1,
                'periodo_id' => 3,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'valor' => '98.00',
                'grupo_materia_id' => 1,
                'periodo_id' => 4,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'valor' => '83.00',
                'grupo_materia_id' => 2,
                'periodo_id' => 1,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'valor' => '83.00',
                'grupo_materia_id' => 2,
                'periodo_id' => 2,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            6 => 
            array (
                'id' => 7,
                'valor' => '80.00',
                'grupo_materia_id' => 2,
                'periodo_id' => 3,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            7 => 
            array (
                'id' => 8,
                'valor' => '82.00',
                'grupo_materia_id' => 2,
                'periodo_id' => 4,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            8 => 
            array (
                'id' => 9,
                'valor' => '89.00',
                'grupo_materia_id' => 3,
                'periodo_id' => 1,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            9 => 
            array (
                'id' => 10,
                'valor' => '80.00',
                'grupo_materia_id' => 3,
                'periodo_id' => 2,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            10 => 
            array (
                'id' => 11,
                'valor' => '96.00',
                'grupo_materia_id' => 3,
                'periodo_id' => 3,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            11 => 
            array (
                'id' => 12,
                'valor' => '91.00',
                'grupo_materia_id' => 3,
                'periodo_id' => 4,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            12 => 
            array (
                'id' => 13,
                'valor' => '88.00',
                'grupo_materia_id' => 4,
                'periodo_id' => 1,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            13 => 
            array (
                'id' => 14,
                'valor' => '88.00',
                'grupo_materia_id' => 4,
                'periodo_id' => 2,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            14 => 
            array (
                'id' => 15,
                'valor' => '91.00',
                'grupo_materia_id' => 4,
                'periodo_id' => 3,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
            15 => 
            array (
                'id' => 16,
                'valor' => '89.00',
                'grupo_materia_id' => 4,
                'periodo_id' => 4,
                'matricula_id' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}