<?php

namespace App\Http\Controllers;
use App\Models\Matricula;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Nota;
use App\Models\Mensualidad;
use App\Libs\Funciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatriculaController extends Controller
{
    public $parControl=[
        'modulo'=>'inscripcion',
        'funcionalidad'=>'matriculas',
        'titulo' =>'Matriculas',
    ];

    public function index(Request $request)
    {
        $matricula = new Matricula();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $matricula->obtenerMatriculas($buscar,$pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Matriculas'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        }
        $mergeData = [
            'matriculas'=>$resultado['matriculas'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            'permisos' => $permisos
        ];
        return view('matriculas.index',$mergeData);
    }
    
    public function mostrar($id)
    {
        $matricula = Matricula::getMatricula($id);
        $mensualidad = new Mensualidad();
        $mensualidades = $mensualidad->ObtenerMensualidades($matricula->id);

        $mergeData = ['id'=>$id,'matricula'=>$matricula,'mensualidades'=>$mensualidades,'parControl'=>$this->parControl];
        return view('matriculas.mostrar',$mergeData);
    }

    public function agregar()
    { 
        $sql = "select p.id, concat(coalesce(p.primer_apellido,''),' ',coalesce(p.segundo_apellido,''),' ',p.nombres) as nombre_completo 
                        from estudiantes e
                        inner join personas p on  e.id = p.id 
                        where  p.activo=1 and p.eliminado=0 and not exists(select m.estudiante_id from matriculas m where m.estudiante_id = e.id )";
        $estudiantes = DB::select($sql); 
        $grupos = new Grupo();
        $grupo = $grupos->obtenerGruposActivos();
        $grupo =  Grupo::obtenerGruposActivos();                      
        $mergeData = ['parControl'=>$this->parControl,
                        'estudiantes' => $estudiantes ,
                        'grupos'=> $grupo  
                        ];
        return view('matriculas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'monto'=>'required|max:30',
            'id'=>'required|max:30',
            'grupo_id'=>'required'
        ]);

        $matricula = new Matricula();
        $matricula->fecha = date('Y-m-d');
        $matricula->monto = $request->monto;
        $matricula->estudiante_id = $request->id;
        $matricula->grupo_id = $request->grupo_id;
        $matricula->observacion = $request->observacion;
        $matricula->anulado = false;
        $matricula->save();
        $mensualidad = new Mensualidad();
        $mensualidad->GenerarMensualidades($matricula->id);
        return redirect()->route('matriculas.mostrar',$matricula->id);
    }

    public function estudiantesActivos(Request $request)
    {
        $buscar=$request->q;
        $estudiante = new Estudiante();
        $estudiantes = $estudiante->BuscarEstudiantesActivos($buscar);
        $resultado=[];
        foreach ($estudiantes as $persona){
            $resultado[]=(object)['name'=>$persona->nombre,'id'=>$persona->id];
        }
        return json_encode($resultado);
    }
    
    public function validarNotas(Request $request)
    {
        $estudiante_id=$request->estudiante_id;
        $nota = new Nota();
        $grado_aprobado_id = $nota->ValidarNotasEstudiante($estudiante_id);
        $grupo = new Grupo();
        $grupos = $grupo->ObtenerGruposValidos($grado_aprobado_id);

        $resultado=[];
        foreach ($grupos as $grupo){
            $resultado[]=(object)['codigo'=>$grupo->codigo,'id'=>$grupo->id];
        }
        return json_encode($resultado);
    }


    public function eliminar($id)
    {
        $matricula = Matricula::find($id);
        $matricula->anulado=true;
        $matricula->save();
        return redirect()->route('matriculas.index');
    }
    
}
