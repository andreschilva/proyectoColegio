@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>{{$parControl['titulo']}}</h2>
    </div>  
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">

                    <div class="row"><div class="col-sm-12 m-b-xs"><span class="text-success">Total: <strong>{{$total}}</strong></span></div></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th>Creado</th>
                                
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($bitacoras as $bitacora)
                                <tr>
                                    <td>{{$bitacora->id}}</td>
                                    <td>{{$bitacora->descripcion}}</td>
                                    <td>{{$bitacora->created_at}}</td>    
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

