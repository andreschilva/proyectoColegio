<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MatriculasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('matriculas')->delete();
        
        \DB::table('matriculas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fecha' => '2022-01-10',
                'monto' => '20.00',
                'estudiante_id' => 5,
                'grupo_id' => 1,
                'observacion' => 'migracion',
                'anulado' => 0,

            ),
        ));
        
        
    }
}