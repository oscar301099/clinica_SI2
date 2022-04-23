@extends('adminlte::page')

@section('title', 'clinica Si2')

@section('content_header')
    <h1>historial clinico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('historiaclinica.create')}}" class="btn btn-secondary btb-sm">Crear historia clinica<</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">actividad</th>
                        <th scope="col">alergias</th>
                        <th scope="col">Fecha deingreso</th>
                        <th scope="col">Fecha de salida</th>
                        <th scope="col">enfermedad</th>
                        <th scope="col">medicamentos</th>
                                       </tr>
                </thead>
    
                <tbody>
                    @foreach ($historiaclinicas as $historiaclinica)
                        <tr>
                            <td>{{$historiaclinica->id}}</td>
                            <td>{{$historiaclinica->actividad}}</td>  
                            <td>{{$historiaclinica->alergias}}</td>      
                            <td>{{$historiaclinica->Fecha_ingreso}}</td>   
                            <td>{{$historiaclinica->Fecha_salida}}</td>  
                            <td>{{$historiaclinica->enfermedad}}</td>  
                            <td>{{$historiaclinica->medicamentos}}</td>                        
                            <td >
                            
                                <form action="{{url('/historiaclinica/'.$historiaclinica->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <a href="{{route('historiaclinica.edit', $historiaclinica->id)}}"  class="btn btn-primary btn-sm">Editar</a>
                                   
                                   
                                    <div style="padding-top: 0.50rem"></div>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button>                                    
                                   
                                    
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