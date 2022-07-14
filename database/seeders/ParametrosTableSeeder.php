<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParametrosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parametros')->delete();
        
        \DB::table('parametros')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'gestion_notas',
                'valor' => '1',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'gestion_matricula',
                'valor' => '2',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'mensualidades',
                'valor' => '3,4,5,6,7,8,9,10,11',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'dia_vencimiento',
                'valor' => '05',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'monto_mensualidad',
                'valor' => '80',
            ),
        ));
        
        
    }
}