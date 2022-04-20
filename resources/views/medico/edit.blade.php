@extends('adminlte::page')

@section('title', 'ClinicaSI2')

@section('content_header')
    <h1>Editar medico</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('medico.update', $medico)}}" method="post"  >
                @csrf
                @method('put')
                <label for="nombre">edite el nombre del medico</label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre', $medico->nombre)}}" required><br>

                <label for="email">edite el email del medico</label>
                <input type="text" name="email" class="form-control" value="{{old('email', $medico->email)}}" required><br>
                
                <label for="celular">edite el celular del medico</label>
                <input type="text" name="celular" class="form-control" value="{{old('celular', $medico->celular)}}" required><br>
       
                <label for="celular">edite el password del medico</label>
                <input type="text" name="password" class="form-control" value="{{old('password', $medico->password)}}" required><br>
               
                <br><br>      
                
                                                      

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar datos</button>
                <a class="btn btn-primary btn-sm" href="{{route('medico.index')}}">Volver</a>
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