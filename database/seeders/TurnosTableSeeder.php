<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('turnos')->delete();
        
        \DB::table('turnos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Mañana',
                'hora_ini' => '07:30:00',
                'hora_fin' => '12:30:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Tarde',
                'hora_ini' => '13:30:00',
                'hora_fin' => '18:30:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}