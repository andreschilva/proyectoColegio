<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\Grupo;
use App\Models\GrupoMateria;
use App\Models\Bitacora;
use Database\Seeders\GruposMateriasTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GrupoMateriaController extends Controller
{
    public $parControl=[
        'modulo'=>'academico',
        'funcionalidad'=>'grupos',
        'titulo' =>'Grupos',
    ];

    public function index(Request $request,$idGrupo)
    {
        /* dd($idGrupo); */
        $grupoMateria = new GrupoMateria();
        $buscar=$request->buscar;
        $pagina=$request->pagina;
        $resultado = $grupoMateria->obtenerGrupos_Materias($buscar,$pagina,$idGrupo);
        /* foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Grupos'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
        } */
        $Grupo = Grupo::find($idGrupo);
        $mergeData = [
            'nombreGrupo' => $Grupo->nombre,
            'idGrupo' => $idGrupo,
            'gruposMaterias'=>$resultado['gruposMaterias'],
            'total'=>$resultado['total'],
            'buscar'=>$buscar,
            'parPaginacion'=>$resultado['parPaginacion'],
            'parControl'=>$this->parControl,
            /* 'permisos' => $permisos */
        ];
        return view('grupoMaterias.index',$mergeData);
    }


    public function agregar($idGrupo)
    { 
        $Docentes= new Docente();
        $Docentes = $Docentes->obtenerDocentes('',1);

        $Grupo =  Grupo::find($idGrupo);

        $sql = "select materias.*
                from materias
                where not EXISTS(select materias.nombre
                                from grupos_materias   
                                where materias.id = grupos_materias.materia_id and grupos_materias.grupo_id = $idGrupo)";

        $materias=  DB::select($sql);

        $mergeData = ['parControl'=>$this->parControl, 'Docentes'=>$Docentes['docentes'], 'materias'=>$materias, 'Grupo'=>$Grupo];

        return view('grupoMaterias.agregar',$mergeData);  
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'materia_id'=>'required',
            'docente_id'=>'required',
            'grupo_id'=>'required',
            'activo'=>'required',
        ]);

        $GrupoMateria = new GrupoMateria();
        $GrupoMateria->docente_id = $request->docente_id;
        $GrupoMateria->materia_id = $request->materia_id;
        $GrupoMateria->grupo_id = $request->grupo_id;
        $GrupoMateria->activo = $request->activo?true:false;
        $GrupoMateria->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha insertado un nuevo GrupoMateria con id: " .$GrupoMateria ->id ;
        $usuario_dato->save();
        
        return redirect()->route('grupos.index',$request->grupo_id);
    }
/*
    public function modificar($id)
    {
        
        $grupo = Grupo::find($id);

        $gestion= new Gestion();
        $gestiones = $gestion->obtenerGestionesActivos();

        $turno= new Turno();
        $turnos = $turno->obtenerTurnosActivos();

        $grado= new Grado();
        $grados = $grado->obtenerGradosActivos();

        $aula= new Aula();
        $aulas = $aula->obtenerAulasActivas();

        $mergeData = ['parControl'=>$this->parControl, 'grupo'=>$grupo, 'gestiones'=>$gestiones, 'turnos'=>$turnos, 'grados'=>$grados, 'aulas'=>$aulas];
        return view('grupos.modificar',$mergeData);
    }

    public function actualizar(Request $request, Grupo $grupo)
    {
        $request->validate([
            'codigo'=>'required|max:30',
            'nombre'=>'required|max:30',
            'cupos'=>'required|max:30',
            'gestion_id'=>'required',
            'turno_id'=>'required',
            'grado_id'=>'required',
            'aula_id'=>'required',

            'activo'=>'required',
        ]);

        $grupo->codigo = $request->codigo;
        $grupo->nombre = $request->nombre;
        $grupo->cupos = $request->cupos;
        $grupo->gestion_id = $request->gestion_id;
        $grupo->turno_id = $request->turno_id;
        $grupo->grado_id = $request->grado_id;
        $grupo->aula_id = $request->aula_id;

        $grupo->activo = $request->activo?true:false;
        $grupo->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha actualziado un Grupo con id: " .$grupo ->id ;
        $usuario_dato->save();

        return redirect()->route('grupos.mostrar',$grupo->id);
    }

    public function eliminar($id)
    {
        $grupo = Grupo::find($id);
        $grupo->eliminado=true;
        $grupo->save();

        $usuario_dato = new Bitacora();
        $usuario_dato ->descripcion = "Se ha eliminado un Grupo con id: " .$grupo ->id ;
        $usuario_dato->save();

        return redirect()->route('grupos.index');
    } */
}
