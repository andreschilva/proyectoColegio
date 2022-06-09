<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Modulo;
use App\Models\Funcionalidad;
use App\Models\Permiso;
use App\Libs\Funciones;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public $parControl = [
        'modulo' => 'seguridad',
        'funcionalidad' => 'perfiles',
        'titulo' => 'Perfiles',
    ];

    public function index(Request $request)
    {
        $perfil = new Perfil();
        $buscar = $request->buscar;
        $pagina = $request->pagina;
        $resultado = $perfil->obtenerPerfiles($buscar, $pagina);
        foreach(session('permisos') as $modulo) {
            foreach($modulo['funcionalidades'] as $funcionalidad ){
                if( $funcionalidad['titulo'] == 'Perfiles'){ 
                    $permisos = [
                       'Permiso_mostrar'=> $funcionalidad['Permiso_mostrar'],
                       'Permiso_modificar'=> $funcionalidad['Permiso_modificar'],
                       'Permiso_Eliminar'=> $funcionalidad['Permiso_Eliminar'],
                   ];
                }
                
            }
            /* dd($permisos); */
        }
        $mergeData = [
            'perfiles' => $resultado['perfiles'],
            'total' => $resultado['total'],
            'buscar' => $buscar,
            'parPaginacion' => $resultado['parPaginacion'],
            'parControl' => $this->parControl,
            'permisos' => $permisos
            /* 'Permiso_mostrar'=> $permisos['Permiso_mostrar'],
            'Permiso_modificar'=> $permisos['Permiso_modificar'],
            'Permiso_Eliminar'=> $permisos['Permiso_Eliminar'], */

        ];
        return view('perfiles.index', $mergeData);
    }
    public function mostrar($id)
    {
        $perfil = Perfil::find($id);

        $modulo = new Modulo();
        $funcionalidad = new funcionalidad();
        $modulos = $modulo->obtenerModulosActivos();

        foreach ($modulos as $_modulo) {
            $funcionalidades = $funcionalidad->obtenerFuncionalidadesActivasEnPerfil($_modulo->id, $perfil->id);
            $_modulo->funcionalidades = $funcionalidades;
        }

        $mergeData = ['id' => $id, 'perfil' => $perfil, 'parControl' => $this->parControl, 'modulos' => $modulos];
        return view('perfiles.mostrar', $mergeData);
    }

    public function agregar()
    {
        $modulo = new Modulo();
        $funcionalidad = new funcionalidad();
        $modulos = $modulo->obtenerModulosActivos();

        foreach ($modulos as $_modulo) {
            $funcionalidades = $funcionalidad->obtenerFuncionalidadesActivas($_modulo->id);
            $_modulo->funcionalidades = $funcionalidades;
        }

        $mergeData = ['parControl' => $this->parControl, 'modulos' => $modulos];
        return view('perfiles.agregar', $mergeData);
    }

    public function insertar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'activo' => 'required',
        ]);

        $perfil = new Perfil();
        $perfil->nombre = $request->nombre;
        $perfil->activo = $request->activo ? true : false;
        $perfil->save();

        $perfilId = $perfil->id;

        $fucionalidadesIds = $request->funcionalidades;
        if ($fucionalidadesIds) {
            foreach ($fucionalidadesIds as $funcionalidadId) {
                $permiso = new Permiso();
                $permiso->perfil_id = $perfilId;
                $permiso->funcionalidad_id = $funcionalidadId;
                $permiso->save();
            }
        }

        return redirect()->route('perfiles.mostrar', $perfil->id);
    }

    public function modificar($id)
    {
        $perfil = Perfil::find($id);
        $modulo = new Modulo();
        $funcionalidad = new funcionalidad();
        $modulos = $modulo->obtenerModulosActivos();
        foreach ($modulos as $_modulo) {
            $funcionalidades = $funcionalidad->obtenerFuncionalidadesActivasEnPerfil($_modulo->id, $perfil->id);
            $_modulo->funcionalidades = $funcionalidades;
        }

        $mergeData = ['id' => $id, 'perfil' => $perfil, 'parControl' => $this->parControl, 'modulos' => $modulos];
        return view('perfiles.modificar', $mergeData);
    }

    public function actualizar(Request $request, Perfil $perfil)
    {
        $request->validate([
            'nombre' => 'required|max:30',
            'activo' => 'required',

        ]);
        $perfil->nombre = $request->nombre;
        $perfil->activo = $request->activo ? true : false;
        $perfil->save();

        $perfilId = $perfil->id;
       /*  dd($request); */
        $fucionalidades = $request->funcionalidades;
        Permiso::where('perfil_id', $perfilId)->delete(); 
        /* dd($fucionalidades); */
        //        DB::execute("delete from permisos where perfil_id=$perfilId");
        if ($fucionalidades) {
            foreach ($fucionalidades as $funcionalidad) {
                /* dd($funcionalidad); */
                $permiso = new Permiso();
                $permiso->perfil_id = $perfilId;
                $permiso->funcionalidad_id = $funcionalidad['id'];
                if(isset($funcionalidad['Permiso_mostrar'])) {
                    $permiso->Permiso_mostrar = $funcionalidad['Permiso_mostrar'];
                    
                    
                }
                else {
                    $permiso->Permiso_mostrar = 0;
                }
                if(isset($funcionalidad['Permiso_modificar'])) {
                    $permiso->Permiso_modificar = $funcionalidad['Permiso_modificar'];
                    
                    
                }
                else {
                    $permiso->Permiso_modificar = 0;
                }
                if(isset($funcionalidad['Permiso_Eliminar'])) {
                    $permiso->Permiso_Eliminar = $funcionalidad['Permiso_Eliminar'];
                    
                }
                else {
                    $permiso->Permiso_Eliminar = 0;
                }
                
                
                
                $permiso->save();
            }
        }


        return redirect()->route('perfiles.mostrar', $perfil->id);
    }

    public function eliminar($id)
    {
        $perfil = Perfil::find($id);
        $perfil->eliminado = true;
        $perfil->save();
        return redirect()->route('perfiles.index');
    }
}
