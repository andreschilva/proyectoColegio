<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bitacora extends Model
{
    use HasFactory;
    protected $table="bitacoras";

    public function obtenerbitacora($buscar='', $pagina=1)
    {
        $limite=15;
        $filtro="";

        $pagina = $pagina ? $pagina : 1;
        $inicio =  ($pagina -1)* $limite;
        $sql = "select * from bitacoras  order by id asc limit $inicio,$limite ";
        $bitacoras = DB::select($sql);

        $sqlTotal = "select count(*) as total from bitacoras $filtro";
        $result = DB::select($sqlTotal);
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);

            
        }
        return [
            'bitacoras'=>$bitacoras,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    
    }

    public function obtenerBitacorasActivos()
    {
        $sql = "select id,titulo from bitacoras a where a.eliminado =0 and activo=1 order by orden asc";
        $bitacoras = DB::select($sql);
        return $bitacoras;
    }

}
