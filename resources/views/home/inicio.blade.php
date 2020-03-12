{{-- extiende plantilla principal --}}
@extends('app')
{{-- da un nombre al titulo de la pestaña--}}
@section('htmlheader_title')
Inicio
@endsection
{{-- contenido de la pagina principal (solo ventana) --}}
@section('main-content')
{{-- Si el usuario no ha iniciado sesión --}}
@if(Auth::guest())

<div class="container">
    <div class="col-md-8 login animated fadeInDown">
        <div class="panel panel-default row">
            <div class="col-md-6" align="center" style="padding-top:2rem">
                <img style="height: 15rem" src="{{ asset('images/logo.png')}}">        
            </div>
            <div class="panel-body col-md-6">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <br>
                        <label for="email" class="col-md-4 control-label">Documento</label>
                        <div class="col-md-12">
                            <input id="documento" autocomplete="off" type="text" class="form-control" name="documento"
                                value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Contraseña</label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Iniciar Sesión
                            </button>
                            <div>
                                <a style="color: #ff407b" class="btn btn-link" data-toggle="modal"
                                    data-target="#modalRestaurar">
                                    ¿Olvido su contraseña?
                                </a>
                                <a style="color: #ff407b" class="btn btn-link" data-toggle="modal"
                                    data-target="#modalLogin">
                                    Regístrese
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('home.modalRestaurar')
@include('home.modalRegistrarse')

@else
{{-- Si el usuario ya inicio sesión --}}
{{-- <div class="row">
    <div class="card w-100"> --}}
<div class="row">
    <div class="col-md-5 col-md-offset-2 login loginr animated fadeInDown">
        <div>

            <h1> Bienvenido(@)</h1>

            <h2> Rol:{{Auth::User()->roles->nombre}}
           
            <h3> Bienvenido al Gestor de Contactos de Emergencia: {{ Auth::user()->nombres }}
                @if (Auth::User()->password=='$2y$10$vhKmPbvJOEwosRqFUIyV2eu7.gjOI7KVFJlJRxpbmqdHtPQuKdKp6')
                <p style="color: #ff407b">Se recomienda cambiar su contraseña</p>
                @endif
            </h3>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-1 login loginr animated fadeInDown">
        <img style="height: 10rem" src="{{url('images/logo.png')}}">
</div>
</div>


@endif
@endsection