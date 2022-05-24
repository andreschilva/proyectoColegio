<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estudiantes')->delete();

        $estudiante = new Estudiante();
        $estudiante->id = 2;
        $estudiante->login = 'juan';
        $estudiante->pass = md5('123456');
        $estudiante->perfil_id = 1;
        $estudiante->codigo_rude = '45454545';
        $estudiante->activo = 1;
        $estudiante->eliminado =0;
        $estudiante->save();

        

        
    }
}