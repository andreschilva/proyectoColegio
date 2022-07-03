<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Libs\Funciones;
use App\Models\Gestion;
use App\Models\Bitacora;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'gestiones',
        'titulo' =>'Gestiones',
    ];

    public function index(Request $request)
    {
        $gestion = new Gestion();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $gestion->obtenerGestiones($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Gestiones'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'gestiones'=>$resultado['gestiones'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('gestiones.index',$mergeData);
    }
    public function mostrar($id)
    {
        $gestion = Gestion::find($id);
        $mergeData = ['id'=>$id,'gestion'=>$gestion,'parControl'=>$this->parControl];
        return view('gestiones.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $mergeData = ['parControl'=>$this->parControl];
        return view('gestiones.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([

            'anio'=>'required|max:30',
            'fecha_inicio_clases'=>'required|max:30',
            'fecha_final_clases'=>'required|max:30',
            'numeros_periodos'=>'required|max:30',
            'tipos_periodos'=>'required|max:30',
            'activo'=>'required',
        ]);

        $gestion = new Gestion();
        $gestion->anio = $request->anio;
        $gestion->fecha_inicio_clases = $request->fecha_inicio_clases;
        $gestion->fecha_final_clases = $request->fecha_final_clases;
        $gestion->numeros_periodos = $request->numeros_periodos;
        $gestion->tipos_periodos = $request->tipos_periodos;
        $gestion->activo = $request->activo?true:false;
        $gestion->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado una nueva Gestion con id: " .$gestion ->id ;
        $usuario_dato->save();

        return redirect()->route('gestiones.mostrar',$gestion->id);
    }

    public function modificar($id)
    {
        $gestion = Gestion::find($id);
        $mergeData = ['id'=>$id,'gestion'=>$gestion,'parControl'=>$this->parControl];
        return view('gestiones.modificar',$mergeData);
    }

    public function actualizar(Request $request, Gestion $gestion)
    {
        $request->validate([
            'anio'=>'required|max:30',
            'fecha_inicio_clases'=>'required|max:30',
            'fecha_final_clases'=>'required|max:30',
            'numeros_periodos'=>'required|max:30',
            'tipos_periodos'=>'required|max:30',
            'activo'=>'required',
        ]);
        $gestion->anio = $request->anio;
        $gestion->fecha_inicio_clases = $request->fecha_inicio_clases;
        $gestion->fecha_final_clases = $request->fecha_final_clases;
        $gestion->numeros_periodos = $request->numeros_periodos;
        $gestion->tipos_periodos = $request->tipos_periodos;
        $gestion->activo = $request->activo?true:false;
        $gestion->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado una Gestion con id: " .$gestion ->id ;
        $usuario_dato->save();


        return redirect()->route('gestiones.mostrar',$gestion->id);
    }

    public function eliminar($id)
    {
        $gestion = Gestion::find($id);
        $gestion->eliminado=true;
        $gestion->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado una Gestion con id: " .$gestion ->id ;
        $usuario_dato->save();

        return redirect()->route('gestiones.index');
    }
}
