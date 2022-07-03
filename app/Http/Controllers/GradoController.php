<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use App\Libs\Funciones;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'grados',
        'titulo' =>'Grados',
    ];

    public function index(Request $request)
    {
        $grado = new Grado();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $grado->obtenerGrados($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Grados'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'grados'=>$resultado['grados'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('grados.index',$mergeData);
    }


    public function agregar()
    { 
        $nivel= new Nivel();
        $niveles = $nivel->obtenerNivelesActivos();

        $mergeData = ['parControl'=>$this->parControl,'niveles'=>$niveles];
        return view('grados.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'numero'=>'required|max:1',
            'nivel_id'=>'required',
            'activo'=>'required',
        ]);

        $grado = new Grado();
        $grado->nombre = $request->nombre;
        $grado->numero = $request->numero;
        $grado->nivel_id = $request->nivel_id;
        $grado->activo = $request->activo?true:false;
        $grado->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado un nuevo Grado con id: " .$grado->id ;
        $usuario_dato->save();

        return redirect()->route('grados.mostrar',$grado->id);
    }

    public function mostrar($id)
    {
        $grado = Grado::getGrado($id);
        $mergeData = ['id'=>$id,'grado'=>$grado,'parControl'=>$this->parControl];
        return view('grados.mostrar',$mergeData);
    }

    public function modificar($id)
    {
        $grado = Grado::find($id);
        $nivel= new Nivel();
        $niveles = $nivel->obtenerNivelesActivos();

        $mergeData = ['id'=>$id,'grado'=>$grado,'niveles'=>$niveles,'parControl'=>$this->parControl];
        return view('grados.modificar',$mergeData);
    }

    public function actualizar(Request $request, Grado $grado)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'numero'=>'required|max:3',
            'nivel_id'=>'required',
            'activo'=>'required',
        ]);
        $grado->nombre = $request->nombre;
        $grado->numero = $request->numero;
        $grado->nivel_id = $request->nivel_id;
        $grado->activo = $request->activo?true:false;
        $grado->save();

        
        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado un Grado con id: " .$grado->id ;
        $usuario_dato->save();

        return redirect()->route('grados.mostrar',$grado->id);
    }

    public function eliminar($id)
    {
        $grado = Grado::find($id);
        $grado->eliminado=true;
        $grado->save();

        
        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado un Grado con id: " .$grado->id ;
        $usuario_dato->save();

        return redirect()->route('grados.index');
    }    
}
