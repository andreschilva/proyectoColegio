@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Agregar Perfil</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-primary" href="{{ route('perfiles.index') }}">Listado</a>
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form action="{{ route('perfiles.insertar') }}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombre:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                                        required="">
                                </div>
                            </div>
                            @error('nombre')
                                <div class="alert alert-danger alert-dismissable">{{ $message }}<button aria-hidden="true"
                                        data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Activo</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <label> <input type="radio" value="1" name="activo"
                                                @if (old('activo') == '1') checked="" @endif>
                                            <i></i>SI</label>&nbsp;&nbsp;
                                        <label> <input type="radio" value="0" name="activo"
                                                @if (old('activo') == '0') checked="" @endif> <i></i>NO</label>
                                    </div>
                                </div>
                            </div>
                            @error('activo')
                                <div class="alert alert-danger alert-dismissable">{{ $message }}<button aria-hidden="true"
                                        data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Permisos </label>

                                <div class="col-sm-10">
                                   
                                    <?php $contador = 0
                                    ?>
                                    <?php 
                                     $contador2 = 100    
                                    ?>
                                    <?php 
                                     $contador3 = 300   
                                    ?>
                                    <?php 
                                    $contador4 = 400   
                                   ?>
                                    @foreach ($modulos as $modulo)
                                        <div class="i-checks"><label><strong>{{ $modulo->titulo }}</strong></label>
                                        </div>
                                        @foreach ($modulo->funcionalidades as $funcionalidad)
                                            <div class="i-checks">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="row">
                                                    <div class="col-sm-3"><label> <input type="checkbox" name="funcionalidades[{{ $contador }}][id]" id = {{ $contador4 }}
                                                                value={{ $funcionalidad->id }} onclick = "enableDisable({{$contador4}},{{ $contador}},{{ $contador2}},{{ $contador3}});">
                                                                <i></i>{{ $funcionalidad->titulo }}</label>
                                                    </div>

                                                    <div class="col-sm-2"> <label> <input type="checkbox"
                                                                name="funcionalidades[{{ $contador }}][Permiso_mostrar]"
                                                                disabled="" id={{ $contador }} value = 1
                                                                >
                                                            <i></i>mostrar</label>
                                                    </div>

                                                    <div class="col-sm-2"> <label> <input type="checkbox"
                                                                name="funcionalidades[{{ $contador }}][Permiso_modificar]"
                                                                disabled="" id = {{ $contador2 }} value=1
                                                                >
                                                            <i></i>modificar</label>
                                                    </div>

                                                    <div class="col-sm-2"> <label> <input type="checkbox"
                                                                name="funcionalidades[{{ $contador }}][Permiso_Eliminar]"
                                                                disabled="" id={{ $contador3 }} value=1
                                                                >
                                                            <i></i>Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $contador = $contador + 1 ?>
                                            <?php $contador2 = $contador2 + 1 ?>
                                            <?php $contador3 = $contador3 + 1 ?>
                                            <?php $contador4 = $contador4 + 1 ?>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-success " type="submit">Guardar</button>
                                    <button class="btn btn-danger " type="button"
                                        onclick="location.href='{{ route('perfiles.index') }}'">Cancelar</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
