@extends('adminlte::page')

@section('title', 'ClinicaSI2')

@section('content_header')
    <h1>Editar historia clinica</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('historiaclinica.update', $historiaclinica)}}" method="post"  >
                @csrf
                @method('put')
                {{-- <label for="nombre">edite el nombre del historiaclinica</label> --}}
                {{-- <input type="text" name="nombre" class="form-control" value="{{old('nombre', $medico->nombre)}}" required><br> --}}

                
                <br><br>      
                
                                                      

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar datos</button>
                <a class="btn btn-primary btn-sm" href="{{route('historiaclinica.index')}}">Volver</a>
            </form> 
            
            
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop