<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Grupo;
use App\Models\Nota;
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

    public function index2($id)
    {
        
        $grupos = Grupo::where('gestion_id' , $id)->get();
        $gestiones = Gestion::find( $id);
        
        $mergeData = ['grupos'=>$grupos,'gestiones'=>$gestiones,'parControl'=>$this->parControl];
        return view('notas.index2',$mergeData);
    }

    public function index3($idd)
    {
        
        $sql = "select pe.id, concat(pe.primer_apellido,' ',coalesce(pe.segundo_apellido,''),' ',pe.nombres) as nombre, es.codigo_rude from estudiantes es 
                inner join personas pe on pe.id = es.id 
                inner join matriculas ma on ma.estudiante_id = es.id
                inner join grupos gr on gr.id = ma.grupo_id
                where gr.id = $idd";

        $estudiantes = DB::select($sql);
        $grupos = Grupo::find($idd);
        $mergeData = ['grupos'=>$grupos,'estudiantes'=>$estudiantes,'parControl'=>$this->parControl];
        return view('notas.index3',$mergeData);
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
