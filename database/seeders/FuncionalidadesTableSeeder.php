<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FuncionalidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('funcionalidades')->delete();
        
        \DB::table('funcionalidades')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => 'Modulos',
                'ruta' => 'modulos',
                'accion' => 'index',
                'orden' => 1,
                'visible_menu' => 1,
                'modulo_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'titulo' => 'Funcionalidades',
                'ruta' => 'funcionalidades',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'titulo' => 'Areas de Conocimientos',
                'ruta' => 'areas_conocimientos',
                'accion' => 'index',
                'orden' => 1,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'titulo' => 'Turnos',
                'ruta' => 'turnos',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            4 => 
            array (
                'id' => 5,
                'titulo' => 'Aulas',
                'ruta' => 'aulas',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ), 
            5 => 
            array (
                'id' => 6,
                'titulo' => 'Personas',
                'ruta' => 'personas',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 1,
                'activo' => 1,
                'eliminado' => 0,
            ),
             6 => 
            array (
                'id' => 7,
                'titulo' => 'Niveles',
                'ruta' => 'niveles',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            7 => 
            array (
                'id' => 8,
                'titulo' => 'Horas',
                'ruta' => 'horas',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            8 => 
            array (
                'id' => 9,
                'titulo' => 'Materias',
                'ruta' => 'materias',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            9 => 
            array (
                'id' => 10,
                'titulo' => 'Grados',
                'ruta' => 'grados',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            10 => 
            array (
                'id' => 12,
                'titulo' => 'Periodos',
                'ruta' => 'periodos',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ), 
            11 => 
            array (
                'id' => 13,
                'titulo' => 'Perfiles',
                'ruta' => 'perfiles',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 1,
                'activo' => 1,
                'eliminado' => 0,
            ),
             12 => 
            array (
                'id' => 14,
                'titulo' => 'Gestiones',
                'ruta' => 'gestiones',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,
            ), 
            13 => 
            array (
                'id' => 15,
                'titulo' => 'Usuarios',
                'ruta' => 'usuarios',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            14 => 
            array (
                'id' => 16,
                'titulo' => 'Docentes',
                'ruta' => 'docentes',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            15 => 
            array (
                'id' => 17,
                'titulo' => 'Estudiantes',
                'ruta' => 'estudiantes',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
             16 => 
            array (
                'id' => 18,
                'titulo' => 'Grupos',
                'ruta' => 'grupos',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            17 => 
            array (
                'id' => 19,
                'titulo' => 'Matriculas',
                'ruta' => 'matriculas',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 3,
                'activo' => 1,
                'eliminado' => 0,

            ),
           18 => 
            array (
                'id' => 20,
                'titulo' => 'Rep. Inscritos',
                'ruta' => 'rep_inscritos',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 4,
                'activo' => 1,
                'eliminado' => 0,

            ),
            19 => 
            array (
                'id' => 21,
                'titulo' => 'Rep. Notas',
                'ruta' => 'rep_notas',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 4,
                'activo' => 1,
                'eliminado' => 0,
            ),
            20 => 
            array (
                'id' => 22,
                'titulo' => 'Mensualidades',
                'ruta' => 'mensualidades',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 3,
                'activo' => 1,
                'eliminado' => 0,
            ),
            
            21 => 
            array (
                'id' => 23,
                'titulo' => 'Bitacoras',
                'ruta' => 'bitacoras',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),

            22 => 
            array (
                'id' => 24,
                'titulo' => 'Notas',
                'ruta' => 'notas',
                'accion' => 'index',
                'orden' => 2,
                'visible_menu' => 1,
                'modulo_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}