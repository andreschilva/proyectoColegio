<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ModulosTableSeeder::class);
        $this->call(FuncionalidadesTableSeeder::class);
        $this->call(PerfilesTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(PersonasTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(EstudiantesTableSeeder::class);
        $this->call(UpdatePersonasSeeder::class);
        
        /* $this->call(DocentesTableSeeder::class); */
        
    }
}
