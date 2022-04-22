@extends('adminlte::page')

@section('title', 'Clinica Si2')

@section('content_header')
    <h1>Medicos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> medico ya registrado.
      </div>
         
        @enderror
            <form action="{{route('medico.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="nombre">ingresar nombre medico</label>
                        <input type="text" name="nombre" class="form-control"  value="{{old('nombre')}}" id="nombre" required>
                        <label for="email">ingresar email del  medico</label>
                        <input type="text" name="email" class="form-control"  value="{{old('email')}}" id="email" required>
                        <label for="celular">ingresar celular del medico</label>
                        <input type="text" name="celular" class="form-control"  value="{{old('celular')}}" id="celular" required>
                        <label for="password">ingresar password del medico</label>
                        <input type="text" name="password" class="form-control"  value="{{old('password')}}" id="password" required>
                    </div>

                   

                    
                
           
                    
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir medico</button>
                    <a class="btn btn-danger" href="{{route('medico.index')}}">Volver</a>
                </div>
                
            </form>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop