{{-- extiende plantilla principal --}}
@extends('app')
{{-- da un nombre al titulo de la pestaña--}}
@section('htmlheader_title')
Registrar usuarios
@endsection
{{-- contenido de la pagina principal (solo ventana) --}}
@section('main-content')


    <div class="row">            
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" style="margin-top: 5%">
                <div class="card-header">
                    <h2> Registrar Usuarios Manual</h2>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalLogin">Registrar Usuario</button>
                </div>      
            </div>
        </div>     
    </div>
    
    <div class="row">            
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" style="margin-top: 5%">
                <div class="card-header">
                    <h2> Registrar Usuarios Masivo</h2>
                    <hr>
                    <form action="{{url('/cargaMasiva')}}" method="POST" enctype="multipart/form-data">
                    <input name="carga" required type="file">
                    <br><br>
                    
                    <a href="{{ url('/formatos/formatoCargaMasiva.xlsx') }}" class="btn btn-primary">Descargar Formato</a>
                    <input  class="btn btn-success" type="submit" value="Cargar Usuarios">
                    </form>
                </div>      
            </div>
        </div>     
    </div> 
    @include('usuarios.modalVerDetalles')
    @include('home.modalRegistrarse') 
    @include('usuarios.modalRegistrarContactos') 
@endsection