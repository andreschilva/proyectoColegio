<?php

namespace App\Http\Controllers;

use App\Models\Hora;
use App\Libs\Funciones;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class HoraController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'horas',
        'titulo' =>'Horas de Clase',
    ];

    public function index(Request $request)
    {
        $hora = new Hora();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $hora->obtenerHoras($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Horas'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'horas'=>$resultado['horas'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('horas.index',$mergeData);
    }
    public function mostrar($id)
    {
        $hora = Hora::find($id);
        $mergeData = ['id'=>$id,'hora'=>$hora,'parControl'=>$this->parControl];
        return view('horas.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('horas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'hora_ini'=>'required|max:8',
            'hora_fin'=>'required|max:8',
            'activo'=>'required',
        ]);

        $hora = new Hora();
        $hora->hora_ini = $request->hora_ini;
        $hora->hora_fin = $request->hora_fin;
        $hora->activo = $request->activo?true:false;
        $hora->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado una nueva Hora con id: " .$hora ->id ;
        $usuario_dato->save();

        return redirect()->route('horas.mostrar',$hora->id);
    }

    public function modificar($id)
    {
        $hora = Hora::find($id);
        $mergeData = ['id'=>$id,'hora'=>$hora,'parControl'=>$this->parControl];
        return view('horas.modificar',$mergeData);
    }

    public function actualizar(Request $request, Hora $hora)
    {
        $request->validate([
            'hora_ini'=>'required|max:8',
            'hora_fin'=>'required|max:8',
            'activo'=>'required',
        ]);

        $hora->hora_ini = $request->hora_ini;
        $hora->hora_fin = $request->hora_fin;
        $hora->activo = $request->activo?true:false;
        $hora->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado una  Hora con id: " .$hora ->id ;
        $usuario_dato->save();

        return redirect()->route('horas.mostrar',$hora->id);
    }

    public function eliminar($id)
    {
        $hora = Hora::find($id);
        $hora->eliminado=true;
        $hora->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado una Hora con id: " .$hora ->id ;
        $usuario_dato->save();

        return redirect()->route('horas.index');
    }
}
