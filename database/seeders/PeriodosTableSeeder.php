<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periodos')->delete();
        
        \DB::table('periodos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fecha_inicio' => '2020-02-03',
                'fecha_fin' => '2020-04-30',
                'numero' => 1,
                'gestion_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'fecha_inicio' => '2020-04-01',
                'fecha_fin' => '2020-05-31',
                'numero' => 2,
                'gestion_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'fecha_inicio' => '2020-06-01',
                'fecha_fin' => '2020-08-31',
                'numero' => 3,
                'gestion_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'fecha_inicio' => '2020-09-01',
                'fecha_fin' => '2020-12-01',
                'numero' => 4,
                'gestion_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'fecha_inicio' => '2021-02-03',
                'fecha_fin' => '2021-04-30',
                'numero' => 1,
                'gestion_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'fecha_inicio' => '2021-04-01',
                'fecha_fin' => '2021-05-31',
                'numero' => 2,
                'gestion_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            6 => 
            array (
                'id' => 7,
                'fecha_inicio' => '2021-06-01',
                'fecha_fin' => '2021-08-31',
                'numero' => 3,
                'gestion_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            7 => 
            array (
                'id' => 8,
                'fecha_inicio' => '2021-09-01',
                'fecha_fin' => '2021-12-01',
                'numero' => 4,
                'gestion_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}