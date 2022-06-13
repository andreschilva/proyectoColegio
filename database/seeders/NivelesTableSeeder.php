<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NivelesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('niveles')->delete();
        
        \DB::table('niveles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Inicial',
                'numero' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Primaria',
                'numero' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Secundaria',
                'numero' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}