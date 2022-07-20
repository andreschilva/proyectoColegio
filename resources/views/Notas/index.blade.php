@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Elegir gestion </h2>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Gestion</th>
                             
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gestiones as $gestion)
                                <tr>
                                    <td>{{$gestion->id}}</td>
                                    <td>{{$gestion->anio}}</td>
                         

                                    <td data-texto="{{$gestion->anio}}">

                                            <a href="{{route('notas.grupos',$gestion->id)}}" title="Elegir"><img width="17px" src="{{asset('img/iconos/mostrar.png')}}" alt="Mostrar"></a>   

    
                                        
                                        
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

