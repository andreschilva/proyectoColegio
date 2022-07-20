<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Grupo;
use App\Models\Nota;
use App\Models\Bitacora;
use App\Models\Estudiante;
use App\Models\Periodo;
use App\Models\Persona;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'notas',
        'titulo' =>'Notas',
    ];

    public function index()
    {   
        $sql = "select id,anio from gestiones where activo=1 and eliminado=0 order by anio desc";
        $gestiones = DB::select($sql);
        $grupos = [];
            $sql = "select id, nombre, codigo from grupos";
            $grupos = DB::select($sql);

        $mergeData = [
            'gestiones'=>$gestiones,
            'grupos'=>$grupos,
            'parPaginacion'=>[],
            'parControl'=>$this->parControl
        ];
        return view('Notas.index',$mergeData);
    }

    public function grupos($id)
    {
        
        $grupos = Grupo::where('gestion_id' , $id)->get();
        $gestiones = Gestion::find( $id);
        
        $mergeData = ['grupos'=>$grupos,'gestiones'=>$gestiones,'parControl'=>$this->parControl];
        return view('notas.grupos',$mergeData);
    }

    public function estudiantes($id)
    {
        
        $sql = "select pe.id, concat(pe.primer_apellido,' ',coalesce(pe.segundo_apellido,''),' ',pe.nombres) as nombre, es.codigo_rude from estudiantes es 
                inner join personas pe on pe.id = es.id 
                inner join matriculas ma on ma.estudiante_id = es.id
                inner join grupos gr on gr.id = ma.grupo_id
                where gr.id = $id";


        $estudiantes = DB::select($sql);
        $grupo = Grupo::find($id);
        $mergeData = ['grupo'=>$grupo,'estudiantes'=>$estudiantes,'parControl'=>$this->parControl];
        return view('notas.estudiantes',$mergeData);
    }

    public function mostrar(  $id,Grupo $grupo, $periodo)
    {
        $sql = "select notas.id as idnota, materias.nombre as Asignatura, personas.nombres, notas.valor as nota, periodos.numero as periodo , grupos_materias.grupo_id  FROM notas
                    INNER JOIN grupos_materias on grupos_materias.id = notas.grupo_materia_id
                    INNER JOIN materias on materias.id = grupos_materias.materia_id
                    INNER JOIN matriculas on matriculas.id = notas.matricula_id
                    INNER JOIN estudiantes on matriculas.estudiante_id = estudiantes.id
                    INNER JOIN personas on personas.id = estudiantes.id
                    INNER JOIN periodos on periodos.id = notas.periodo_id
                    where estudiantes.id = $id and periodos.numero = $periodo ";

        $notas = DB::select($sql);
        $estudiante = Persona::find($id);
        $periodoo = Periodo::where('numero' , $periodo)->where('gestion_id',$grupo->gestion_id)->get();
        /* dd($periodoo);  */
        $mergeData = ['notas'=>$notas,'estudiante'=>$estudiante,'grupo'=>$grupo,'periodo'=>$periodoo,'numeroPeriodo'=>$periodo, 'parControl'=>$this->parControl];
        return view('notas.mostrar',$mergeData);
    }


    public function agregar($id,Grupo $grupo, $periodo)
    { 
        $sql = "select materias.nombre , materias.id as IdMateria
                from materias
                INNER JOIN grupos_materias on grupos_materias.materia_id = materias.id
                INNER JOIN grupos on grupos.id = grupos_materias.grupo_id 
                INNER JOIN matriculas ON grupos.id = matriculas.grupo_id
                INNER join estudiantes on matriculas.estudiante_id = estudiantes.id
                where estudiantes.id = $id ";
        $materias = DB::select($sql);

        $sql = "select concat(coalesce(personas.primer_apellido,''),' ',coalesce(personas.segundo_apellido,''),' ',personas.nombres) as nombre_completo ,
                        matriculas.estudiante_id, matriculas.id as idmatricula, periodos.id as idPeriodo, grupos.id as idgrupo
                        FROM matriculas
                        INNER JOIN grupos on grupos.id = matriculas.grupo_id
                        INNER JOIN gestiones on gestiones.id = grupos.gestion_id
                        INNER JOIN periodos on gestiones.id = periodos.gestion_id
                        INNER JOIN personas on matriculas.estudiante_id = personas.id
                        where matriculas.estudiante_id = $id and periodos.numero = $periodo";
        $datos = DB::select($sql);

         $estudiante = Persona::find($id);
        $periodoo = Periodo::where('numero' , $periodo)->where('gestion_id',$grupo->gestion_id)->get();

        $mergeData = ['materias'=>$materias,
        'estudiante'=>$estudiante,
        'grupo'=>$grupo,
        'periodo'=>$periodoo,
        'datos'=>$datos,
        'parControl'=>$this->parControl];
        /* dd($mergeData); */
        return view('notas.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
 
        /* dd($request); */
        $sql = "select grupos_materias.id as idgrupoMAteria from grupos_materias
                INNER JOIN grupos on grupos.id = grupos_materias.grupo_id 
                INNER JOIN matriculas ON grupos.id = matriculas.grupo_id
                INNER JOIN gestiones ON grupos.gestion_id = gestiones.id
                INNER JOIN periodos on periodos.gestion_id = gestiones.id 
                where matriculas.estudiante_id = $request->estudiante_id and periodos.numero = $request->idPeriodo and grupos_materias.materia_id = $request->materia_id";
        $idGrupoMateria = DB::select($sql);
        /* dd($idGrupoMateria); */

        $nota = new Nota();
        $nota->valor = $request->nota;
        $nota->grupo_materia_id = $idGrupoMateria[0]->idgrupoMAteria;
        $nota->periodo_id = $request->idPeriodo;
        $nota->matricula_id = $request->idmatricula;
        $nota->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado una nueva Nota con id: " .$nota->id ;
        $usuario_dato->save();

        return redirect()->route('notas.index');
    }

    public function modificar($id)
    {
        $sql = "select materias.nombre , materias.id as IdMateria
        from materias
         INNER JOIN grupos_materias on grupos_materias.materia_id = materias.id
         INNER JOIN notas on notas.grupo_materia_id = grupos_materias.id
         WHERE notas.id = $id";
        $materia = DB::select($sql);
        $nota = Nota::find($id);
        $mergeData = ['id'=>$id,'nota'=>$nota,'materia'=>$materia,'parControl'=>$this->parControl];

        return view('notas.modificar',$mergeData);
    }

    public function actualizar(Request $request, Nota $nota)
    {
        $request->validate([
            'nota'=>'required|max:5',
        ]);
        $nota->valor = $request->nota;
        $nota->grupo_materia_id = $nota->grupo_materia_id;
        $nota->periodo_id = $nota->periodo_id;
        $nota->matricula_id =  $nota->matricula_id;
        $nota->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualizado una Nota con id: " .$nota ->id ;
        $usuario_dato->save();

        return redirect()->route('notas.index'/* ,$nivel->id */);
    }

    public function ObtenerFilaMaticula($resultados, $matricula_id){
        foreach($resultados as $nota){
            if($matricula_id==$nota->matricula_id){
                return $nota;
            }
        }
        return null;
    }
}
