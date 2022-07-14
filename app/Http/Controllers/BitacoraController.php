<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public $parControl=[
        'modulo'=>'seguridad',
        'funcionalidad'=>'bitacoras',
        'titulo' =>'Bitacoras',
    ];

    public function index(Request $request)
    {
        $bitacora = new Bitacora();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $bitacora->obtenerbitacora($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Bitacoras'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
        'bitacoras'=>$resultado['bitacoras'],
        'total'=>$resultado['total'],
        'buscar'=>$buscar,
        'parPaginacion'=>$resultado['parPaginacion'],
        'parControl'=>$this->parControl,
        'permisos' => $permisos];
        return view('bitacoras.index',$mergeData);
    }
}
