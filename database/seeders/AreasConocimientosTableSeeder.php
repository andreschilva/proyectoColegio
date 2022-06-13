<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreasConocimientosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Areas_conocimientos')->delete();
        
        \DB::table('Areas_conocimientos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Comunidad y Sociedad',
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Ciencia Tecnologia y Produccion',
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Vida, Tierra y Territorio',
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Cosmos y Pensamiento',
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}