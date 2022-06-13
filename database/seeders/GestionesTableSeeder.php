<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GestionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gestiones')->delete();
        
        \DB::table('gestiones')->insert(array (
            0 => 
            array (
                'id' => 1,
                'anio' => 2021,
                'fecha_inicio_clases' => '2021-02-03',
                'fecha_final_clases' => '2021-12-01',
                'numeros_periodos' => 4,
                'tipos_periodos' => 'BI',
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'anio' => 2022,
                'fecha_inicio_clases' => '2022-02-03',
                'fecha_final_clases' => '2022-12-01',
                'numeros_periodos' => 4,
                'tipos_periodos' => 'BI',
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}