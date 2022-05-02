@extends('adminlte::page')

@section('title', 'clinica Si2')

@section('content_header')
    <h1>cita clinico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

            <a href="{{route('cita.create')}}" class="btn btn-secondary btb-sm">Crear cita clinica</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">fecha de la cita</th>
                        <th scope="col">hora de la cita</th>
                        <th scope="col">Id del cliente</th>
                        <th scope="col">Id del medico</th>
                      
                                       </tr>
                </thead>
                <tbody>
                    @foreach ($cita as $cita)
                    {{-- Id_cliente','Id_medico' ||$historiaclinica->Id_medico==auth()->user()->id
                    {{auth()->user()->id]]}}
                    --}}
                        <tr>
                         
                            <td>{{$cita->id}}</td>
                            <td>{{$cita->Fecha_cita}}</td>   
                            <td>{{$cita->Hora_cita}}</td>  
                            <td>{{$cita->Id_cliente}}</td>  
                            <td>{{$cita->Id_medico}}</td>                        
                            <td >
                                <form action="{{url('/cita/'.$cita->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    @can('Rol Admin')
                                    <a href="{{route('cita.edit', $cita->id)}}"  class="btn btn-primary btn-sm">Editar</a>    
                                    @endcan
                                    
                                    <div style="padding-top: 0.50rem"></div>
                                    @can('Rol Admin')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button>  
                                    @endcan     
                                    @can('Rol medico')
                                    <a href="{{route('historiaclinica.create')}}" class="btn btn-secondary btb-sm">Crear historia clinica</a>  
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