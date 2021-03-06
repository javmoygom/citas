@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Tratamientos</div>

                    <div class="panel-body">
                        @include('flash::message')


                        {!! Form::open(['route' => 'tratamientos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear Tratamiento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Paciente</th>
                                <th>Medico</th>
                                <th>Descripcion</th>
                                <th colspan="3">Acciones</th>

                            </tr>

                            @foreach ($tratamientos as $tratamiento)

                                <tr>
                                    <td>{{ (new DateTime($tratamiento->fecha_inicio))->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ (new DateTime($tratamiento->fecha_fin))->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $tratamiento->paciente->full_name }}</td>
                                    <td>{{ $tratamiento->medico->full_name }}</td>
                                    <td>{{ $tratamiento->descripcion }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.edit',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.destroy',$tratamiento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['prescripciones.create',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Crear prescripcion', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection