@extends('adminlte::page')

@section('title', 'clinica Si2')

@section('content_header')
    <h1>Medicos</h1>
@stop

@section('content')
    <div class="card">
        @can('Rol Admin')
        <div class="card-header">
        <a href="{{route('medico.create')}}" class="btn btn-primary btn-sm">Crear medico</a>    
        @endcan
            
        </div>
    
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="medico" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de Medico</th>
                        <th scope="col">celular</th>
                        <th scope="col">correo</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">descripcion</th>
                       
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($medicos as $medico)
                    <tr>
                        <td>{{$medico->id}}</td>
                        <td>{{$medico->nombre}}</td>
                        <td>{{$medico->email}}</td>
                        <td>{{$medico->celular}}</td>
    
                        <td>
                        @foreach ($especialidades as $especialidad)
                            @if ($medico->id = $especialidad->id_medico)
                           *{{$especialidad->descripcion}} <br>
                            @endif
                        @endforeach
                        </td>
    
                        <td>
                            @can('Rol Admin')
                            <a href="{{ url('medico/especialidad', $medico->id) }}" style="margin-top: 0.35rem" class="fas fa-pencil-alt"><i class="fas fa-plus-square"></i> Especialidad</a>
                            @endcan
                                @can('Rol Admin')
                                <a class="btn btn-primary btn-sm" style="margin-top: 5px" href="{{route('medico.edit',$medico)}}"><i class="fas fa-pencil-alt"></i>  Editar</a>  
                                @endcan
                                @can('Rol cliente')
                                <a class="btn btn-primary btn-sm" style="margin-top: 5px" href="{{route('cita.create')}}"><i class="fas fa-pencil-alt"></i>  solicitar</a>
                                @endcan
                              
                            
                            
                            <form action="{{route('medico.destroy',$medico)}}" method="POST">
                                @csrf
                                @method('delete')
                                @can('Rol Admin')
                                <button class="btn btn-danger btn-sm" style="margin-top: 0.35rem" onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" value="Borrar"><i class="fas fa-trash"></i>  Eliminar</button>
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