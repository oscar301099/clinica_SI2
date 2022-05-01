@extends('adminlte::page')

@section('title', 'ClinicaSI2')

@section('content_header')
    <h1>Editar cita</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
                         {{--  <label   for="Fecha_cita">ingresar fecha de la cita</label>
                        <input type="text" name="Fecha_cita" class="form-control"   id="Fecha_cita" required>
                        <label for="Hora_cita">ingresar Hora de la cita </label>
                        <input type="text" name="Hora_cita" class="form-control"  id="Hora_cita" required>
                        <label for="Id_cliente">ingresar Id del cliente</label>
                        <input type="text" name="Id_cliente" class="form-control"   id="Id_cliente" required>
                        <label for="Id_medico">ingresar ID Medico </label>
                        <input type="text" name="Id_medico" class="form-control"   id="Id_medico" required> --}}
            <form action="{{route('cita.update', $cita)}}" method="post"  >
                @csrf
                @method('put')
                <label   for="Fecha_cita">ingresar fecha de la cita</label>
                <input type="text" name="Fecha_cita" class="form-control" value="{{old('Fecha_cita', $cita->Fecha_cita)}}" required><br>

                <label for="Hora_cita">ingresar Hora de la cita </label>
                <input type="text" name="Hora_cita" class="form-control" value="{{old('Hora_cita', $cita->Hora_cita)}}" required><br>
                
                <label for="Id_cliente">ingresar Id del cliente</label>
                <input type="text" name="Id_cliente" class="form-control" value="{{old('Id_cliente', $cita->Id_cliente)}}" required><br>
       
                <label for="Id_medico">ingresar ID Medico </label>
                <input type="text" name="Id_medico" class="form-control" value="{{old('Fecha_salida',$cita->Id_medico)}}" required><br>
                <br><br>      
                <button  class="btn btn-danger btn-sm" type="submit">Actualizar cita</button>
                <a class="btn btn-primary btn-sm" href="{{route('cita.index')}}">Volver</a>
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