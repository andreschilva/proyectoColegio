<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdatePersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Primer Admin*/
        DB::table('Personas')->where('id', '1')->update(['nombres' => 'Andres']);
        DB::table('Personas')->where('id', '1')->update(['primer_apellido' => 'Silva']);
        DB::table('Personas')->where('id', '1')->update(['segundo_apellido' => 'Serrate']);

        /*Segundo Admin*/
        DB::table('Personas')->where('id', '2')->update(['nombres' => 'Guido']);
        DB::table('Personas')->where('id', '2')->update(['primer_apellido' => 'Salazar']);
        DB::table('Personas')->where('id', '2')->update(['segundo_apellido' => 'Vargas']);

        /*Tercer Admin*/
        DB::table('Personas')->where('id', '3')->update(['nombres' => 'Kevin']);
        DB::table('Personas')->where('id', '3')->update(['primer_apellido' => 'Alpire']);
        DB::table('Personas')->where('id', '3')->update(['segundo_apellido' => 'Artega']);

        /*Cuarto Admin*/
        DB::table('Personas')->where('id', '4')->update(['nombres' => 'Dario']);
        DB::table('Personas')->where('id', '4')->update(['primer_apellido' => 'Suarez']);
        DB::table('Personas')->where('id', '4')->update(['segundo_apellido' => 'Lazarte']);


    }
}
