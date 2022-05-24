<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('personas')->delete();

        $persona = new Persona();
        $persona->id = 1;
        $persona->nombres = 'andres';
        $persona->primer_apellido = 'silva';
        $persona->segundo_apellido ='S';
        $persona->genero = 'M';
        $persona->ci = '123456';
        $persona->ci_exp = 'SC';
        $persona->fecha_nacimiento = '1998-12-28';
        $persona->celular = '69135481';
        $persona->telefono = '33585657';
        $persona->direccion = NULL;
        $persona->correo = NULL;
        $persona->activo = 1;
        $persona->eliminado = 0;
        $persona->save();
        
        $persona = new Persona();
        $persona->id = 2;
        $persona->nombres = 'Juan';
        $persona->primer_apellido = 'chumacero';
        $persona->segundo_apellido ='perez';
        $persona->genero = 'M';
        $persona->ci = '1234321';
        $persona->ci_exp = 'SC';
        $persona->fecha_nacimiento = '1996-12-28';
        $persona->celular = '69133323';
        $persona->telefono = '33534645';
        $persona->direccion = NULL;
        $persona->correo = NULL;
        $persona->activo = 1;
        $persona->eliminado = 0;
        $persona->save();

        $persona = new Persona();
        $persona->id = 3;
        $persona->nombres = 'David';
        $persona->primer_apellido = 'Fernandez';
        $persona->segundo_apellido ='Vera';
        $persona->genero = 'M';
        $persona->ci = '12887464';
        $persona->ci_exp = 'SC';
        $persona->fecha_nacimiento = '1998-09-13';
        $persona->celular = '78048364';
        $persona->telefono = '78048365';
        $persona->direccion = 'plan 300 av. radial 10';
        $persona->correo = 'GATIN@GMAIL.COM';
        $persona->activo = 1;
        $persona->eliminado = 0;
        $persona->save();
        
    }
}