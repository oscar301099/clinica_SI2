@extends('adminlte::page')

@section('title', 'clinica Si2')

@section('content_header')
    <h1>Medicos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('medico.create')}}" class="btn btn-secondary btb-sm">Crear medico</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de Medico</th>
                        <th scope="col">celular</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($medico as $medico)
                        <tr>
                            <td>{{$medico->id}}</td>
                            <td>{{$medico->nombre}}</td>  
                            <td>{{$medico->celular}}</td>                            
                            <td >
                            
                                <form action="{{url('/medico/'.$medico->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <a href="{{route('medico.edit', $medico)}}"  class="btn btn-primary btn-sm">Editar</a>
                                    
                                    @can('Editar medico')
                                    @endcan
                                    <div style="padding-top: 0.50rem"></div>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button>                                    
                                    @can('Eliminar medico')
                                    @endcan
                                </form>
                            
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
         $('#roles').DataTable();
        } );
    </script> 
@stop