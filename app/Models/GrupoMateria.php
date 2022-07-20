<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GrupoMateria extends Model
{
    use HasFactory;
    protected $table="grupos_materias";

    public function obtenerGrupos_Materias($buscar='', $pagina=1,$idGrupo)
    {
        $limite=10;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (materias.nombre like '%$buscar%' or IFNULL(personas.nombres,'Sin Docente') like '%$buscar%') ";
        }

        $sql = "select gr.*, materias.nombre as nombreMateria, grupos.nombre as nombreGrupo,  IFNULL(personas.nombres,'Sin Docente') as nombreDocente
        from grupos_materias gr
        inner join materias on materias.id = gr.materia_id
        inner join grupos  on grupos.id =gr.grupo_id  
        LEFT join docentes on docentes.id = gr.docente_id
        LEFT JOIN personas on personas.id = docentes.id
        where gr.eliminado = 0 and grupos.id = $idGrupo $filtro order by gr.id desc limit $inicio,$limite";

        $gruposMaterias = DB::select($sql);

        $sqlTotal = "select count(*) as total 
        from grupos_materias gr
        inner join materias on materias.id = gr.materia_id
        inner join grupos  on grupos.id =gr.grupo_id  
        LEFT join docentes on docentes.id = gr.docente_id
        LEFT JOIN personas on personas.id = docentes.id
        where gr.eliminado =0 and grupos.id = $idGrupo $filtro ";

        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'gruposMaterias'=>$gruposMaterias,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }
    public static function obtenerGruposActivos()
    {
        $sql = "select id,nombre
                from grupos gr
                where gr.eliminado =0 and gr.activo = 1 order by nombre asc";
        $grupos = DB::select($sql);
        return $grupos;
    }

    public static function getGrupo($id)
    {  
        $sql = "select gr.*, g.anio as gestion, t.nombre as turno, gra.nombre as grado, a.nombre as aula
                from grupos gr
                inner join gestiones g on g.id =gr.gestion_id 
                inner join turnos t on t.id =gr.turno_id
                inner join grados gra on gra.id =gr.grado_id
                inner join aulas a on a.id =gr.aula_id
                where gr.eliminado =0 and gr.id=$id";
        $grupos = DB::select($sql);
        if(count($grupos)>0){
            return $grupos[0];
        }else{
            return null;
        }
    }

}
