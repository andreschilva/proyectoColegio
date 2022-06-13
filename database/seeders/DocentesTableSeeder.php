<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocentesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Docentes')->delete();
        
        \DB::table('Docentes')->insert(array (
            0 => 
            array (
                'id' => 6,
                'login' => '36363636',
                'pass' => '654891',
                'perfil_id' => 2,
                'codigo_docente' => '25252525',
                'tipo' => 'doc',
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 7,
                'login' => '74747474',
                'pass' => '321564',
                'perfil_id' => 2,
                'codigo_docente' => '54545454',
                'tipo' => 'doc',
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 8,
                'login' => 'angel',
                'pass' => '231564',
                'perfil_id' => 2,
                'codigo_docente' => '26458975',
                'tipo' => 'doc',
                'activo' => 1,
                'eliminado' => 0,

            ),
            3 => 
            array (
                'id' => 9,
                'login' => 'lilian',
                'pass' => '34343564',
                'perfil_id' => 2,
                'codigo_docente' => '98653212',
                'tipo' => 'doc',
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}