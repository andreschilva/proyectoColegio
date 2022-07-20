@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Modificar Nota</h2>
            {{-- <h2>Estudiante: {{$datos[0]->nombre_completo}}</h2> --}}
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        {{-- <a class="btn btn-primary" href="{{route('notas.index3',$datos[0]->idgrupo)}}">Listado</a> --}}
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form action="{{route("notas.actualizar",$nota)}}" method="post">
                            @csrf
                                                 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Materia:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="materia" value="{{old('materia',$materia[0]->nombre)}}" required="" disabled = true>
                                </div>
                            </div>
                            @error('materia_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nota:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nota" value="{{old('nota',$nota->valor)}}" required="">
                                </div>
                            </div>
                            @error('nota')
                            <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror
                            
                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-success " type="submit">Guardar</button>
                                    <button class="btn btn-danger " type="button" onclick="location.href='{{route('notas.index')}}'">Cancelar</button>
                                    
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop
