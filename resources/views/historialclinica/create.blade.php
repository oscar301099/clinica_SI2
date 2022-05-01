@extends('adminlte::page')

@section('title', 'Clinica Si2')

@section('content_header')
    <h1>historia clinica</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> historiaclinica ya registrado.
      </div>
         
        @enderror
            <form action="{{route('historiaclinica.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">
                      
                        <label for="actividad">ingresar actividad clinica</label>
                        <input type="text" name="actividad" class="form-control"   id="actividad" required>
                        <label for="alergias">ingresar alergias del  paciente</label>
                        <input type="text" name="alergias" class="form-control"  id="alergias" required>
                        <label for="Fecha_ingreso">ingresar Fecha de ingreso</label>
                        <input type="text" name="Fecha_ingreso" class="form-control"   id="Fecha_ingreso" required>
                        <label for="password">ingresar Fecha de salida </label>
                        <input type="text" name="Fecha_salida" class="form-control"   id="Fecha_salida" required>
                        <label for="password">ingresar enfermedad</label>
                        <input type="text" name="enfermedad" class="form-control"  id="enfermedad" required>
                        <label for="password">ingresar medicamentos</label>
                        <input type="text" name="medicamentos" class="form-control"   id="medicamentos" required>
                        <label for="password">ingresar Id Cliente</label>
                        <input type="text" name="Id_cliente" class="form-control"  id="Id_cliente" required>
                        <label for="password">ingresar ID del medico</label>
                        <input type="text" name="Id_medico" class="form-control"  id="Id_medico" required>
                        <form method="POST" action="{{route('subir.index')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label for="archivo"><b>Archivo: </b></label><br>
                            <input type="file" name="files" required>
                            <input class="btn btn-success" type="submit" value="Enviar" >
                        </form>
                       
                    </div>

                   

                    
                
           
                    
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir historia clinica</button>
                    <a class="btn btn-danger" href="{{route('historiaclinica.index')}}">Volver</a>
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