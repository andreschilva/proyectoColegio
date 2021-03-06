<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Libs\Funciones;
use App\Models\Gestion;
use App\Models\Periodo;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'periodos',
        'titulo' =>'Periodos',
    ];

    public function index(Request $request)
    {
        $periodo = new Periodo();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $periodo->obtenerPeriodos($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Periodos'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'periodos'=>$resultado['periodos'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('periodos.index',$mergeData);
    }
    public function mostrar($id)
    {
        $periodo = Periodo::getPeriodo($id);
        $mergeData = ['id'=>$id,'periodo'=>$periodo,'parControl'=>$this->parControl];
        return view('periodos.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $gestion= new Gestion();
        $gestiones = $gestion->obtenerGestionesActivos();

        $mergeData = ['parControl'=>$this->parControl,'gestiones'=>$gestiones];
        return view('periodos.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'fecha_inicio'=>'required|max:30',
            'fecha_fin'=>'required|max:30',
            'numero'=>'required|max:30',
            'gestion_id'=>'required',
            'activo'=>'required',
        ]);

        $periodo = new Periodo();
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin = $request->fecha_fin;
        $periodo->numero = $request->numero;
        $periodo->gestion_id = $request->gestion_id;
        $periodo->activo = $request->activo?true:false;
        $periodo->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado un nuevo Periodo con id: " .$periodo ->id ;
        $usuario_dato->save();


        return redirect()->route('periodos.mostrar',$periodo->id);
    }

    public function modificar($id)
    {
        $periodo = Periodo::find($id);
        $gestion = new Gestion();
        $gestiones = $gestion->obtenerGestionesActivos();
        $mergeData = ['id'=>$id,'periodo'=>$periodo,'gestiones'=>$gestiones,
                    'parControl'=>$this->parControl];
        return view('periodos.modificar',$mergeData);
    }

    public function actualizar(Request $request, Periodo $periodo)
    {
        $request->validate([
            'fecha_inicio'=>'required|max:30',
            'fecha_fin'=>'required|max:30',
            'numero'=>'required|max:30',
            'gestion_id'=>'required',
            'activo'=>'required',
        ]);
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin = $request->fecha_fin;
        $periodo->numero = $request->numero;
        $periodo->gestion_id = $request->gestion_id;
        $periodo->activo = $request->activo?true:false;
        $periodo->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado un Periodo con id: " .$periodo ->id ;
        $usuario_dato->save();

        return redirect()->route('periodos.mostrar',$periodo->id);
    }

    public function eliminar($id)
    {
        $periodo = Periodo::find($id);
        $periodo->eliminado=true;
        $periodo->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado un Periodo con id: " .$periodo ->id ;
        $usuario_dato->save();

        return redirect()->route('periodos.index');
    }
}
