@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">

</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <a class="btn btn-primary" href="{{route('notas.index3',$grupo->id)}}">Listado</a>
                    <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                </div>
                <div class="ibox-content" id="print-area">
                    
                    <div style="text-align: center ; width: 900px" >
                        <strong>COLEGIO TECNICO HUMANISTICO DE CONVENIO</strong><BR>
                        <strong>MATEO KULJIS ILIC</strong><BR>
                        {{-- <strong>Boletin</strong><BR>
                        <strong>GESTION </strong><BR> --}}
                        <HR>
                    </div>
                    <div class="col-lg-12">
                        <h2>Estudiante: {{$estudiante->nombres}}</h2>
                        @if($numeroPeriodo == 1 )
                            <h2> Notas Primer Periodo </h2>
                        @endif
                        @if($numeroPeriodo == 2)
                        <h2> Notas Segundo Periodo </h2>
                        @endif
                        @if($numeroPeriodo == 3 )
                        <h2> Notas Tercer Periodo </h2>
                        @endif
                        
                    </div>
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Asignatura</th>
                                <th>Nota</th>
                                <th>*</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($notas as $nota)
                                <tr>
                                    <td>{{$nota->Asignatura}}</td>
                                    <td>{{$nota->nota}}</td>
                                    <td><a href="{{route('notas.modificar',$nota->idnota)}}" title="Modificar"><img width="17px" src="{{asset('img/iconos/modificar.png')}}" alt="Modificar"></a></td>
                                    
                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                       
                    </table>
                </div>
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-success " type="button" id="btn-imprimir">Imprimir</button>
                        <button class="btn btn-info " type="button" onclick="location.href='{{route('notas.index3',$grupo->id)}}'">Volver</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
       $('#btn-imprimir').click(function(){
        $("div#print-area").printArea();
       });
    });

    
</script>
@stop
