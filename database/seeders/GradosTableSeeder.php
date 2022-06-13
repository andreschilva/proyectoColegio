<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GradosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('grados')->delete();
        
        \DB::table('grados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Pre Kinder',
                'numero' => 1,
                'nivel_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Kinder',
                'numero' => 2,
                'nivel_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Primero',
                'numero' => 3,
                'nivel_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Segundo',
                'numero' => 4,
                'nivel_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Tercero',
                'numero' => 5,
                'nivel_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Cuarto',
                'numero' => 6,
                'nivel_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Quinto',
                'numero' => 7,
                'nivel_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Sexto',
                'numero' => 8,
                'nivel_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Primero',
                'numero' => 9,
                'nivel_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Segundo',
                'numero' => 10,
                'nivel_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Tercero',
                'numero' => 11,
                'nivel_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Cuarto',
                'numero' => 12,
                'nivel_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Quinto',
                'numero' => 13,
                'nivel_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Sexto',
                'numero' => 14,
                'nivel_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}