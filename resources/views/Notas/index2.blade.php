@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Cursos Gestion {{$gestiones->anio}}</h2>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="btn btn-primary" href="{{route('notas.index')}}">Atras</a>
                    <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                </div>
                <div class="ibox-content">
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Grupo</th>
                                <th>Codigo</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grupos as $grupo)
                                <tr>
                                    <td>{{$grupo->id}}</td>
                                    <td>{{$grupo->nombre}}</td>
                                    <td>{{$grupo->codigo}}</td>


                                    <td data-texto="{{$grupo->nombre}}">

                                            <a href="{{route('notas.index3',['id' => $grupo->id ,'idgestion'=>$gestiones->id])}}" title="Ver Notas"><img width="17px" src="{{asset('img/iconos/mostrar.png')}}"  alt="Mostrar">ver</a>   
     
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
