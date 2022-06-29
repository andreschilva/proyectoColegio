<?php


namespace App\Http\Controllers;

use App\Models\AreaConocimiento;
use App\Libs\Funciones;
use Illuminate\Http\Request;
//hecho por will
class AreaConocimientoController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'areas_conocimientos',
        'titulo' =>'Areas de Conocimientos',
    ];

    public function index(Request $request)
    {
        $areaConocimiento = new AreaConocimiento();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $areaConocimiento->obtenerAreaConocimientos($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Areas de Conocimientos'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
        'areas_conocimientos'=>$resultado['areas_conocimientos'],
        'total'=>$resultado['total'],
        'buscar'=>$buscar,
        'parPaginacion'=>$resultado['parPaginacion'],
        'parControl'=>$this->parControl,
        'permisos' => $permisos];
        return view('areas_conocimientos.index',$mergeData);
    }
    public function mostrar($id)
    {
        $areaConocimiento = AreaConocimiento::find($id);
        $mergeData = ['id'=>$id,'area_conocimiento'=>$areaConocimiento,'parControl'=>$this->parControl];
        return view('areas_conocimientos.mostrar',$mergeData);
    }

    public function agregar()
    {   
        $mergeData = ['parControl'=>$this->parControl];
        return view('areas_conocimientos.agregar',$mergeData);
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'activo'=>'required',
        ]);

        $areaConocimiento = new AreaConocimiento();
        $areaConocimiento->nombre = $request->nombre;
        $areaConocimiento->activo = $request->activo?true:false;
        $areaConocimiento->save();

        return redirect()->route('areas_conocimientos.mostrar',$areaConocimiento->id);
    }

    public function modificar($id)
    {
        $areaConocimiento = AreaConocimiento::find($id);
        $mergeData = ['id'=>$id,'area_conocimiento'=>$areaConocimiento,'parControl'=>$this->parControl];
        return view('areas_conocimientos.modificar',$mergeData);
    }

    public function actualizar(Request $request, AreaConocimiento $areaConocimiento)
    {
        $request->validate([
            'nombre'=>'required|max:30',
            'activo'=>'required',
        ]);
        $areaConocimiento->nombre = $request->nombre;
        $areaConocimiento->activo = $request->activo?true:false;
        $areaConocimiento->save();

        return redirect()->route('areas_conocimientos.mostrar',$areaConocimiento->id);
    }

    public function eliminar($id)
    {
        $areaConocimiento = AreaConocimiento::find($id);
        $areaConocimiento->eliminado=true;
        $areaConocimiento->save();
        return redirect()->route('areas_conocimientos.index');
    }
}
