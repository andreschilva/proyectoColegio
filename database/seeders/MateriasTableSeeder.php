<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MateriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('materias')->delete();
        
        \DB::table('materias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Matemáticas',
                'sigla' => 'MAT',
                'area_conocimiento_id' => 4,
                'activo' => 1,
                'eliminado' => 0,

            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Lenguaje',
                'sigla' => 'LEN',
                'area_conocimiento_id' => 4,
                'activo' => 1,
                'eliminado' => 0,

            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Ciencias Naturales',
                'sigla' => 'CINA',
                'area_conocimiento_id' => 4,
                'activo' => 1,
                'eliminado' => 0,
 
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Ciencias Sociales',
                'sigla' => 'CISO',
                'area_conocimiento_id' => 1,
                'activo' => 1,
                'eliminado' => 0,
 
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Educación Musical',
                'sigla' => 'MUS',
                'area_conocimiento_id' => 1,
                'activo' => 1,
                'eliminado' => 0,
 
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'CCCC',
                'sigla' => 'SOC',
                'area_conocimiento_id' => 1,
                'activo' => 1,
                'eliminado' => 0,
 
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Artes Plásticas y Visuales',
                'sigla' => 'APV',
                'area_conocimiento_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Educación Física',
                'sigla' => 'EDF',
                'area_conocimiento_id' => 4,
                'activo' => 1,
                'eliminado' => 0,
       
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Biología',
                'sigla' => 'BIO',
                'area_conocimiento_id' => 3,
                'activo' => 1,
                'eliminado' => 0,
     
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Geografía',
                'sigla' => 'GEO',
                'area_conocimiento_id' => 3,
                'activo' => 1,
                'eliminado' => 0,
        
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Física',
                'sigla' => 'FIS',
                'area_conocimiento_id' => 3,
                'activo' => 1,
                'eliminado' => 0,
       
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Química',
                'sigla' => 'QMC',
                'area_conocimiento_id' => 3,
                'activo' => 1,
                'eliminado' => 0,
    
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'MMMMM',
                'sigla' => 'MAT',
                'area_conocimiento_id' => 2,
                'activo' => 1,
                'eliminado' => 0,

            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Áreas Técnicas Tecnológicas',
                'sigla' => 'ATT',
                'area_conocimiento_id' => 1,
                'activo' => 1,
                'eliminado' => 0,
  
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'lenjauge',
                'sigla' => 'lin101',
                'area_conocimiento_id' => 1,
                'activo' => 1,
                'eliminado' => 0,

            ),
        ));
        
        
    }
}