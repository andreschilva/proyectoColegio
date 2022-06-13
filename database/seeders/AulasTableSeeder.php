<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AulasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aulas')->delete();
        
        \DB::table('aulas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => '01',
                'capacidad' => 30,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => '02',
                'capacidad' => 34,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => '03',
                'capacidad' => 36,
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => '04',
                'capacidad' => 36,
                'activo' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => '05',
                'capacidad' => 30,
                'activo' => 1,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => '06',
                'capacidad' => 30,
                'activo' => 1,
                'eliminado' => 0,

            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => '07',
                'capacidad' => 32,
                'activo' => 1,
                'eliminado' => 0,

            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => '08',
                'capacidad' => 30,
                'activo' => 1,
                'eliminado' => 0,

            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => '09',
                'capacidad' => 30,
                'activo' => 1,
                'eliminado' => 0,

            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => '10',
                'capacidad' => 32,
                'activo' => 1,
                'eliminado' => 0,

            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => '11',
                'capacidad' => 32,
                'activo' => 1,
                'eliminado' => 0,

            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => '12',
                'capacidad' => 32,
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}