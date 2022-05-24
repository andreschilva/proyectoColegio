<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usuarios')->delete();

        $usuario = new Usuario();
        $usuario->id = 1;
        $usuario->login = 'admin';
        $usuario->pass = md5('1234') ;
        $usuario->perfil_id = 3;
        $usuario->activo = 1;               
        $usuario->eliminado = 0;
        $usuario->tipo ='sup';
        $usuario->save();


        
        

        
        
    }
}