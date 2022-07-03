<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Libs\Funciones;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'aulas',
        'titulo' =>'Aulas',
    ];

    public function index(Request $request)
    {
        $aula = new Aula();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $aula->obtenerAulas($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Aulas'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'aulas'=>$resultado['aulas'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('aulas.index',$mergeData);
    }
    public function mostrar($id)
    {
        $aula = Aula::find($id);
        $mergeData = ['id'=>$id,'aula'=>$aula,'parControl'=>$this->parControl];
        return view('aulas.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('aulas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:10',
            'capacidad'=>'required|max:3',
            'activo'=>'required',
        ]);

        $aula = new Aula();
        $aula->nombre = $request->nombre;
        $aula->capacidad = $request->capacidad;
        $aula->activo = $request->activo?true:false;
        $aula->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado una nueva Aula con id: " .$aula ->id ;
        $usuario_dato->save();

        return redirect()->route('aulas.mostrar',$aula->id);
    }

    public function modificar($id)
    {
        $aula = Aula::find($id);
        $mergeData = ['id'=>$id,'aula'=>$aula,'parControl'=>$this->parControl];
        return view('aulas.modificar',$mergeData);
    }

    public function actualizar(Request $request, Aula $aula)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'capacidad'=>'required|max:8',
            'activo'=>'required',
        ]);
        $aula->nombre = $request->nombre;
        $aula->capacidad = $request->capacidad;
        $aula->activo = $request->activo?true:false;
        $aula->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado una Aula con id: " .$aula ->id ;
        $usuario_dato->save();

        return redirect()->route('aulas.mostrar',$aula->id);
    }

    public function eliminar($id)
    {
        $aula = Aula::find($id);
        $aula->eliminado=true;
        $aula->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado un Aula con id: " .$aula ->id ;
        $usuario_dato->save();

        return redirect()->route('aulas.index');
    }
}
