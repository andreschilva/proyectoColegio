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
                'id' => 9,
                'perfil_id' => 2,
                'funcionalidad_id' => 6,
            ),
/*             1 => 
            array (
                'id' => 10,
                'perfil_id' => 2,
                'funcionalidad_id' => 3,
                'created_at' => '2021-02-20 21:52:21',
                'updated_at' => '2021-02-20 21:52:21',
            ),
            2 => 
            array (
                'id' => 11,
                'perfil_id' => 2,
                'funcionalidad_id' => 4,
                'created_at' => '2021-02-20 21:52:21',
                'updated_at' => '2021-02-20 21:52:21',
            ), */
/*             3 => 
            array (
                'id' => 12,
                'perfil_id' => 2,
                'funcionalidad_id' => 5,
                'created_at' => '2021-02-20 21:52:22',
                'updated_at' => '2021-02-20 21:52:22',
            ),
            4 => 
            array (
                'id' => 13,
                'perfil_id' => 2,
                'funcionalidad_id' => 7,
                'created_at' => '2021-02-20 21:52:22',
                'updated_at' => '2021-02-20 21:52:22',
            ),
            5 => 
            array (
                'id' => 14,
                'perfil_id' => 2,
                'funcionalidad_id' => 8,
                'created_at' => '2021-02-20 21:52:22',
                'updated_at' => '2021-02-20 21:52:22',
            ),
            6 => 
            array (
                'id' => 15,
                'perfil_id' => 2,
                'funcionalidad_id' => 9,
                'created_at' => '2021-02-20 21:52:22',
                'updated_at' => '2021-02-20 21:52:22',
            ), */
            7 => 
            array (
                'id' => 19,
                'perfil_id' => 3,
                'funcionalidad_id' => 6,

            ),
           /*  8 => 
            array (
                'id' => 20,
                'perfil_id' => 3,
                'funcionalidad_id' => 3,
                'created_at' => '2021-02-21 13:27:57',
                'updated_at' => '2021-02-21 13:27:57',
            ),
            9 => 
            array (
                'id' => 21,
                'perfil_id' => 3,
                'funcionalidad_id' => 7,
                'created_at' => '2021-02-21 13:27:57',
                'updated_at' => '2021-02-21 13:27:57',
            ),
            10 => 
            array (
                'id' => 22,
                'perfil_id' => 3,
                'funcionalidad_id' => 9,
                'created_at' => '2021-02-21 13:27:57',
                'updated_at' => '2021-02-21 13:27:57',
            ),
            11 => 
            array (
                'id' => 23,
                'perfil_id' => 3,
                'funcionalidad_id' => 10,
                'created_at' => '2021-02-21 13:27:57',
                'updated_at' => '2021-02-21 13:27:57',
            ),
            12 => 
            array (
                'id' => 24,
                'perfil_id' => 3,
                'funcionalidad_id' => 12,
                'created_at' => '2021-02-21 13:27:57',
                'updated_at' => '2021-02-21 13:27:57',
            ),
            13 => 
            array (
                'id' => 25,
                'perfil_id' => 3,
                'funcionalidad_id' => 14,
                'created_at' => '2021-02-21 13:27:58',
                'updated_at' => '2021-02-21 13:27:58',
            ), */
            14 => 
            array (
                'id' => 26,
                'perfil_id' => 4,
                'funcionalidad_id' => 17,

            ),
            15 => 
            array (
                'id' => 27,
                'perfil_id' => 4,
                'funcionalidad_id' => 16,

            ),
            /* 16 => 
            array (
                'id' => 28,
                'perfil_id' => 4,
                'funcionalidad_id' => 18,
                'created_at' => '2021-03-14 14:04:14',
                'updated_at' => '2021-03-14 14:04:14',
            ),
            17 => 
            array (
                'id' => 29,
                'perfil_id' => 4,
                'funcionalidad_id' => 19,
                'created_at' => '2021-03-14 14:04:14',
                'updated_at' => '2021-03-14 14:04:14',
            ), */
            18 => 
            array (
                'id' => 30,
                'perfil_id' => 5,
                'funcionalidad_id' => 1,

            ),
            19 => 
            array (
                'id' => 31,
                'perfil_id' => 5,
                'funcionalidad_id' => 6,

            ),
            20 => 
            array (
                'id' => 32,
                'perfil_id' => 5,
                'funcionalidad_id' => 17,

            ),
            21 => 
            array (
                'id' => 33,
                'perfil_id' => 5,
                'funcionalidad_id' => 16,

            ),
            /* 22 => 
            array (
                'id' => 34,
                'perfil_id' => 5,
                'funcionalidad_id' => 19,
                'created_at' => '2021-04-02 15:22:13',
                'updated_at' => '2021-04-02 15:22:13',
            ),
            23 => 
            array (
                'id' => 35,
                'perfil_id' => 5,
                'funcionalidad_id' => 20,
                'created_at' => '2021-04-02 15:22:14',
                'updated_at' => '2021-04-02 15:22:14',
            ), */
            24 => 
            array (
                'id' => 36,
                'perfil_id' => 6,
                'funcionalidad_id' => 2,

            ),
   /*          25 => 
            array (
                'id' => 37,
                'perfil_id' => 6,
                'funcionalidad_id' => 4,
                'created_at' => '2021-05-08 15:21:35',
                'updated_at' => '2021-05-08 15:21:35',
            ),
            26 => 
            array (
                'id' => 38,
                'perfil_id' => 6,
                'funcionalidad_id' => 19,
                'created_at' => '2021-05-08 15:21:35',
                'updated_at' => '2021-05-08 15:21:35',
            ), */
        ));
        
        
    }
}