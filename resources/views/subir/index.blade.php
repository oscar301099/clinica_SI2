@extends('adminlte::page')

@section('title', 'clinica Si2')

@section('content_header')
    <h1>Subir archivo</h1>
@stop

@section('content')
    <div class="card">
       
       {{--  <img src="{{Storage::disk('s3')->url('files/tfg8xYHFxo6NBvCw74yGdeEzb9yU1d2ZtmjKSvP4.png')}}" alt=""> 
       este codigo muestra la imagen del s3
       --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles" style="width:100%">
                <thead>
                    <tr>
                       
                    </tr>
                </thead>
    
                <tbody>
               
                           
                                
        <form method="POST" action="{{route('subir.index')}}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="archivo"><b>Archivo: </b></label><br>
            <input type="file" name="files" required>
            <input class="btn btn-success" type="submit" value="Enviar" >
        </form>
                            
                            </td>
                            
                        </tr>
              
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



