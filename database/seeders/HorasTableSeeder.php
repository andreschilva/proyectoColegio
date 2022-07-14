<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HorasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('horas')->delete();
        
        \DB::table('horas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hora_ini' => '07:30:00',
                'hora_fin' => '09:00:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'hora_ini' => '09:30:00',
                'hora_fin' => '10:30:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'hora_ini' => '11:00:00',
                'hora_fin' => '12:30:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'hora_ini' => '13:30:00',
                'hora_fin' => '15:00:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'hora_ini' => '15:30:00',
                'hora_fin' => '16:30:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
            5 => 
            array (
                'id' => 6,
                'hora_ini' => '17:00:00',
                'hora_fin' => '18:30:00',
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}