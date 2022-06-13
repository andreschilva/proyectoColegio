<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permiso extends Model
{
    use HasFactory;
    protected $table="permisos";

    public function obtenerUsuario($login,$password,$tipo){
        if($tipo=='adm'){
            $sql = "select concat(coalesce(p.primer_apellido,''),' ',coalesce(p.segundo_apellido,''),' ',p.nombres) as nombre_completo ,u.login,u.perfil_id,u.id,u.tipo
                        from usuarios u 
                        inner join personas p on p.id=u.id
                        where u.login =? and pass=?
                        and u.activo=1 and u.eliminado=0";
            $usuarios = DB::select($sql, [$login,$password]);
            if(count($usuarios)>0){
                return $usuarios[0];
            }else{
                return null;
            }
        }else if ($tipo=='est'){ // buscar estudiante
             $sql = "select concat(coalesce(p.primer_apellido,''),' ',coalesce(p.segundo_apellido,''),' ',p.nombres) as nombre_completo ,e.login,e.perfil_id,e.id,e.tipo
                        from estudiantes e 
                        inner join personas p on p.id = e.id
                        where e.login =? and e.pass=?
                        and e.activo=1 and e.eliminado=0 and e.perfil_id= 1";
            $estudiantes = DB::select($sql, [$login,$password]);
           
            if(count($estudiantes)>0){
                
                return $estudiantes[0];
            }else{
                return null;
            } 

        }else if ($tipo=='doc'){ // buscar en docente
            $sql = "select concat(coalesce(p.primer_apellido,''),' ',coalesce(p.segundo_apellido,''),' ',p.nombres) as nombre_completo ,d.login,d.perfil_id,d.id,d.tipo
            from docentes d 
            inner join personas p on p.id = d.id
            where d.login =? and d.pass=?
            and d.activo=1 and d.eliminado=0 and perfil_id = 2";
            $docentes = DB::select($sql, [$login,$password]);

            if(count($docentes)>0){
                
                return $docentes[0];
            }else{
                return null;
            } 

        }else {
            return null;
        }
    }
    public function obtenerPermisosUsuario($perfil_id,$usuTipo){
        $permisos=[];
        if($usuTipo=='sup'){
            $modulos = DB::select("select * from modulos m where activo =1 and eliminado =0 order by orden asc");
            foreach($modulos as $modulo){
                $funcionalidades = DB::select("select * from funcionalidades f where f.visible_menu=1 and f.activo =1 and f.eliminado =0 and f.modulo_id=? order by orden asc",[$modulo->id]);
                
                $_funcionalidades=[];
                foreach ($funcionalidades as $funcionalidad){
                    $_funcionalidad=[
                        'id'=>$funcionalidad->id,
                        'titulo'=>$funcionalidad->titulo,
                        'ruta'=>$funcionalidad->ruta,
                        'accion'=>$funcionalidad->accion,
                        'Permiso_mostrar'=>  1,
                        'Permiso_modificar'=> 1,
                        'Permiso_Eliminar'=> 1,
                    ];
                    $_funcionalidades[]=$_funcionalidad;
                }
                $_modulo =[
                'id' => $modulo->id,
                'titulo' => $modulo->titulo,
                'icono' => $modulo->icono,
                'codigo' => $modulo->codigo,
                'funcionalidades'=>$_funcionalidades
                ];
                $permisos[]=$_modulo;
            }
            return $permisos;
        }else{
            $modulos = DB::select("select * from modulos m where activo =1 and eliminado =0 order by orden asc");
            foreach($modulos as $modulo){
                $sql = "select f.id,f.titulo,f.ruta, f.accion, p.perfil_id, p.Permiso_mostrar, p.Permiso_modificar, p.Permiso_Eliminar
                        from funcionalidades f 
                        inner join permisos p on p.funcionalidad_id = f.id and p.perfil_id =$perfil_id
                        where f.activo =1 and f.eliminado =0 and f.modulo_id =$modulo->id order by f.orden asc";
                
                $funcionalidades = DB::select($sql);
                
                $_funcionalidades=[];
                foreach ($funcionalidades as $funcionalidad){
                    $_funcionalidad=[
                        'id'=>$funcionalidad->id,
                        'titulo'=>$funcionalidad->titulo,
                        'ruta'=>$funcionalidad->ruta,
                        'accion'=>$funcionalidad->accion,
                        'Permiso_mostrar'=>$funcionalidad->Permiso_mostrar,
                        'Permiso_modificar'=>$funcionalidad->Permiso_modificar,
                        'Permiso_Eliminar'=>$funcionalidad->Permiso_Eliminar,
                        
                    ];
                    $_funcionalidades[]=$_funcionalidad;
                }
                $_modulo =[
                'id' => $modulo->id,
                'titulo' => $modulo->titulo,
                'icono' => $modulo->icono,
                'codigo' => $modulo->codigo,
                'funcionalidades'=>$_funcionalidades
                ];
                $permisos[]=$_modulo;
            }
            return $permisos;
        }

    }
    
}

