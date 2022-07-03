<?php

namespace App\Http\Controllers;

use App\Libs\Funciones;
use App\Models\Materia;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use App\Models\AreaConocimiento;

class MateriaController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'materias',
        'titulo' =>'Materias',
    ];

    public function index(Request $request)
    {
        $materia = new Materia();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $materia->obtenerMaterias($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Materias'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'materias'=>$resultado['materias'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('materias.index',$mergeData);
    }


    public function agregar()
    { 
        $areaConocimiento= new AreaConocimiento();
        $areas_conocimientos = $areaConocimiento->obtenerAreasConocimientosActivos();

        $mergeData = ['parControl'=>$this->parControl,'areas_conocimientos'=>$areas_conocimientos];
        return view('materias.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'sigla'=>'required|max:20',
            'area_conocimiento_id'=>'required',
            'activo'=>'required',
        ]);

        $materia = new Materia();
        $materia->nombre = $request->nombre;
        $materia->sigla = $request->sigla;
        $materia->area_conocimiento_id = $request->area_conocimiento_id;
        $materia->activo = $request->activo?true:false;
        $materia->save();

        
        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado una nueva Materia con id: " .$materia->id ;
        $usuario_dato->save();

        return redirect()->route('materias.mostrar',$materia->id);
    }

    public function mostrar($id)
    {
        $materia = Materia::getMateria($id);
        $mergeData = ['id'=>$id,'materia'=>$materia,'parControl'=>$this->parControl];
        return view('materias.mostrar',$mergeData);
    }

    public function modificar($id)
    {
        $materia = Materia::find($id);
        $areaConocimiento= new AreaConocimiento();
        $areas_conocimientos = $areaConocimiento->obtenerAreasConocimientosActivos();

        $mergeData = ['id'=>$id,'materia'=>$materia,'areas_conocimientos'=>$areas_conocimientos,'parControl'=>$this->parControl];
        return view('materias.modificar',$mergeData);
    }

    public function actualizar(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre'=>'required|max:50',
            'sigla'=>'required|max:20',
            'area_conocimiento_id'=>'required',
            'activo'=>'required',
        ]);
        $materia->nombre = $request->nombre;
        $materia->sigla = $request->sigla;
        $materia->area_conocimiento_id = $request->area_conocimiento_id;
        $materia->activo = $request->activo?true:false;
        $materia->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado una Materia con id: " .$materia->id ;
        $usuario_dato->save();

        return redirect()->route('materias.mostrar',$materia->id);
    }

    public function eliminar($id)
    {
        $materia = Materia::find($id);
        $materia->eliminado=true;
        $materia->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado un Materia con id: " .$materia->id ;
        $usuario_dato->save();

        return redirect()->route('materias.index');
    }
}
