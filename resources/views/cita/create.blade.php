@extends('adminlte::page')

@section('title', 'Clinica Si2')

@section('content_header')
    <h1>cita medica</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        @error('nombre')
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Error!</strong> cita ya registrado.
      </div>
   {{-- $cita->Fecha_cita=$request->input('Fecha_cita');
        $cita->Hora_cita=$request->input('Hora_cita');
        $cita->Id_cliente=$request->input('Id_cliente'); 
        $cita->Id_medico=$request->input('Id_medico');  --}}
        @enderror
            <form action="{{route('cita.store')}}" method="post" >
                @csrf
                <div class="form-row">
                     <div class="form-group col-md-6">
                      
                        <label for="Fecha_cita">ingresar fecha de la cita</label>
                        <input type="text" name="Fecha_cita" class="form-control"   id="Fecha_cita" required>
                        <label for="Hora_cita">ingresar Hora de la cita </label>
                        <input type="text" name="Hora_cita" class="form-control"  id="Hora_cita" required>
                        <label for="Id_cliente">ingresar Id del cliente</label>
                        <input type="text" name="Id_cliente" class="form-control"   id="Id_cliente" required>
                        <label for="Id_medico">ingresar ID Medico </label>
                        <input type="text" name="Id_medico" class="form-control"   id="Id_medico" required>
                    </div>
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir historia clinica</button>
                    <a class="btn btn-danger" href="{{route('cita.index')}}">Volver</a>
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