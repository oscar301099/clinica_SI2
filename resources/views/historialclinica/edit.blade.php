@extends('adminlte::page')

@section('title', 'ClinicaSI2')

@section('content_header')
    <h1>Editar historial</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{route('historiaclinica.update', $historiaclinica)}}" method="post"  >
                @csrf
                @method('put')
                <label for="actividad">edite la actividad   de historiaclinica</label>
                <input type="text" name="actividad" class="form-control" value="{{old('actividad', $historiaclinica->actividad)}}" required><br>

                <label for="alergias">edite las alergias del  historiaclinica</label>
                <input type="text" name="alergias" class="form-control" value="{{old('alergias', $historiaclinica->alergias)}}" required><br>
                
                <label for="Fecha_ingreso">edite Fecha deingreso del paciente</label>
                <input type="text" name="Fecha_ingreso" class="form-control" value="{{old('Fecha_ingreso', $historiaclinica->Fecha_ingreso)}}" required><br>
       
                <label for="Fecha_salida">edite la  Fecha de salida </label>
                <input type="text" name="Fecha_salida" class="form-control" value="{{old('Fecha_salida', $historiaclinica->Fecha_salida)}}" required><br>
               
                <label for="Fecha_salida">edite la  enfermedad </label>
                <input type="text" name="enfermedad" class="form-control" value="{{old('enfermedad', $historiaclinica->enfermedad)}}" required><br>
               
                <label for="Fecha_salida">edite el medicamentos </label>
                <input type="text" name="medicamentos" class="form-control" value="{{old('medicamentos', $historiaclinica->medicamentos)}}" required><br>
                <label for="Fecha_salida">edite el Id_cliente </label>
                <input type="text" name="Id_cliente" class="form-control" value="{{old('Id_cliente', $historiaclinica->Id_cliente)}}" required><br>
                <label for="Fecha_salida">edite el Id_medico </label>
                <input type="text" name="Id_medico" class="form-control" value="{{old('Id_medico', $historiaclinica->Id_medico)}}" required><br>
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