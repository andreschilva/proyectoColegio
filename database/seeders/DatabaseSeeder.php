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
        $this->call(BitacorasTableSeeder::class);
        
        /* $this->call(DocentesTableSeeder::class); */
        
        $this->call(AreasConocimientosTableSeeder::class);
        $this->call(AulasTableSeeder::class);
        $this->call(GestionesTableSeeder::class);
        $this->call(NivelesTableSeeder::class);
        $this->call(GradosTableSeeder::class);
        $this->call(TurnosTableSeeder::class);
        $this->call(GruposTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
        $this->call(GruposMateriasTableSeeder::class);
        $this->call(MatriculasTableSeeder::class);
        $this->call(ParametrosTableSeeder::class);
        $this->call(HorasTableSeeder::class);
        $this->call(PeriodosTableSeeder::class);
        $this->call(NotasTableSeeder::class);
    }
}
