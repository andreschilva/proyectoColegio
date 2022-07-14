@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Curso {{$grupos->nombre}}</h2>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="btn btn-primary" href="{{route('notas.index2',$grupos->gestion_id)}}">Atras</a>
                    <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                </div>
                <div class="ibox-content">
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Estudiante</th>
                                <th>Codigo Rude</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{$estudiante->id}}</td>
                                    <td>{{$estudiante->nombre}}</td>
                                    <td>{{$estudiante->codigo_rude}}</td>


                                    <td data-texto="{{$estudiante->nombre}}">

                                            {{-- <a href="{{route('notas.index3',$estudiante->id)}}" title="Ver Notas"><img width="17px" src="{{asset('img/iconos/mostrar.png')}}"  alt="Mostrar">ver notas</a> --}}   
     
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
