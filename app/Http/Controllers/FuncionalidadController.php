<?php

namespace App\Http\Controllers;


use App\Models\Bitacora;
use App\Models\Funcionalidad;
use App\Models\Modulo;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class FuncionalidadController extends Controller
{
    public $parControl=[
        'modulo'=>'seguridad',
        'funcionalidad'=>'funcionalidades',
        'titulo' =>'Funcionalidades',
    ];

    public function index(Request $request)
    {
        $funcionalidades = new Funcionalidad();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $funcionalidades->obtenerFuncionalidades($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Funcionalidades'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'funcionalidades'=>$resultado['funcionalidades'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('funcionalidades.index',$mergeData);
    }


    public function agregar()
    { 
        $modulo= new Modulo();
        $modulos = $modulo->obtenerModulosActivos();

        $mergeData = ['parControl'=>$this->parControl,'modulos'=>$modulos];
        return view('funcionalidades.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'titulo'=>'required|max:50',
            'ruta'=>'required|max:20',
            'modulo_id'=>'required',
            'activo'=>'required',
        ]);

        $funcionalidad = new Funcionalidad();
        $funcionalidad->titulo = $request->titulo;
        $funcionalidad->ruta = $request->ruta;
        $funcionalidad->modulo_id = $request->modulo_id;
        $funcionalidad->activo = $request->activo?true:false;
        $funcionalidad->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado una Funcionalidad con id: " .$funcionalidad->id ;
        $usuario_dato->save();


        return redirect()->route('funcionalidades.mostrar',$funcionalidad->id);
    }
    public function mostrar($id)
    {
        $funcionalidad = Funcionalidad::getFuncionalidad($id);
        $mergeData = ['id'=>$id,'funcionalidad'=>$funcionalidad,'parControl'=>$this->parControl];
        return view('funcionalidades.mostrar',$mergeData);
    }

    public function modificar($id)
    {
        $funcionalidad = Funcionalidad::find($id);
        $modulo= new Modulo();
        $modulos = $modulo->obtenerModulosActivos();

        $mergeData = ['id'=>$id,'funcionalidad'=>$funcionalidad,'modulos'=>$modulos,'parControl'=>$this->parControl];
        
        return view('funcionalidades.modificar',$mergeData);
    }

    public function actualizar(Request $request, Funcionalidad $funcionalidad)
    {
        $request->validate([
            'titulo'=>'required|max:50',
            'ruta'=>'required|max:20',
            'modulo_id'=>'required',
            'activo'=>'required',
        ]);

       
        $funcionalidad->titulo = $request->titulo;
        $funcionalidad->ruta = $request->ruta;
        $funcionalidad->modulo_id = $request->modulo_id;
        $funcionalidad->activo = $request->activo?true:false;
        $funcionalidad->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado una Funcionalidad con id: " .$funcionalidad->id ;
        $usuario_dato->save();

        return redirect()->route('funcionalidades.mostrar',$funcionalidad->id);
    }

    public function eliminar($id)
    {
        $funcionalidad = Funcionalidad::find($id);
        $funcionalidad->eliminado=true;
        $funcionalidad->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado una Funcionalidad con id: " .$funcionalidad->id ;
        $usuario_dato->save();

        return redirect()->route('funcionalidades.index');
    }
}
