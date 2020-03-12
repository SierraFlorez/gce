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
                    <h2> Usuarios Registrados</h2>
                    <hr>
                </div>      
            </div>
        </div>     
    </div>
    
   
    @include('usuarios.modalVerDetalles')
    @include('usuarios.modalRegistrar') 
    @include('usuarios.modalRegistrarContactos') 
@endsection