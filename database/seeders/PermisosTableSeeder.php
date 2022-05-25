<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permisos')->delete();
        
        \DB::table('permisos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'perfil_id' => 2,
                'funcionalidad_id' => 17,
            ),

            1 => 
            array (
                'id' => 2,
                'perfil_id' => 3,
                'funcionalidad_id' => 6,

            ),
           
            2 => 
            array (
                'id' => 3,
                'perfil_id' => 3,
                'funcionalidad_id' => 13,

            ),
            3 => 
            array (
                'id' => 4,
                'perfil_id' => 3,
                'funcionalidad_id' =>15 ,

            ),
            
            4 => 
            array (
                'id' => 5,
                'perfil_id' => 3,
                'funcionalidad_id' => 16,

            ),
            5 => 
            array (
                'id' => 6,
                'perfil_id' => 3,
                'funcionalidad_id' => 17,

            ),
            6 => 
            array (
                'id' => 7,
                'perfil_id' => 4,
                'funcionalidad_id' => 6,

            ),
            7 => 
            array (
                'id' => 8,
                'perfil_id' => 4,
                'funcionalidad_id' => 16,

            ),
            
            8=> 
            array (
                'id' => 9,
                'perfil_id' => 4,
                'funcionalidad_id' => 17,

            ),

            9 => 
            array (
                'id' => 10,
                'perfil_id' => 5,
                'funcionalidad_id' => 6,

            ),
            10 => 
            array (
                'id' => 11,
                'perfil_id' => 5,
                'funcionalidad_id' => 16,

            ),
            
            11=> 
            array (
                'id' => 12,
                'perfil_id' => 5,
                'funcionalidad_id' => 17,

            ),
            12 => 
            array (
                'id' => 13,
                'perfil_id' => 7,
                'funcionalidad_id' =>1,

            ),
            13 => 
            array (
                'id' => 14,
                'perfil_id' => 7,
                'funcionalidad_id' => 2,

            ),
            
            14=> 
            array (
                'id' => 15,
                'perfil_id' => 7,
                'funcionalidad_id' => 6,

            ),  6 => 
            array (
                'id' => 16,
                'perfil_id' => 7,
                'funcionalidad_id' => 13,

            ),
            15 => 
            array (
                'id' => 17,
                'perfil_id' => 7,
                'funcionalidad_id' => 15,

            ),
            
            16=> 
            array (
                'id' => 18,
                'perfil_id' => 7,
                'funcionalidad_id' => 16,

            ),
            17=> 
            array (
                'id' => 19,
                'perfil_id' => 7,
                'funcionalidad_id' => 17,

            ),

        ));
        
        
    }
}