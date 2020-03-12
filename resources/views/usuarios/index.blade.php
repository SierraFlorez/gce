{{-- extiende plantilla principal --}}
@extends('app')
{{-- da un nombre al titulo de la pestaña--}}
@section('htmlheader_title')
Consultar usuarios
@endsection
{{-- contenido de la pagina principal (solo ventana) --}}
@section('main-content')

    <div class="row">            
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" style="margin-top: 5%">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <center><h2> Lista De Usuarios </h2></center>
                <div class="card-header" id="table_div_user">
                    <table id="dtUsuarios" class="table table-hover table-dark" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr>
                            <th class="th-sm">ID</th>
                            <th class="th-sm">Nombre</th>
                            <th class="th-sm">Apellidos</th>
                            <th class="th-sm">Documento</th>
                            <th class="th-sm">Estado</th>
                            <th class="th-sm">Contactos</th>
                            <th class="th-sm">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id}}</td>
                                    <td>{{ $usuario->nombres}}</td>
                                    <td>{{ $usuario->apellidos}}</td>
                                    <td>{{ $usuario->documento}}</td>
                                    @if (Auth::user() && (Auth::user()->rol_id==1))
                                        @if ($usuario->estado=='1')
                                            <td><button class="btn btn-primary" onclick="inactivar({{ $usuario->id}},this)">Activo </button></td>
                                        @else 
                                            <td><button class="btn btn-danger" onclick="activar({{ $usuario->id}},this)">Inactivo </button></td>
                                        @endif
                                    @else
                                        @if ($usuario->estado=='1')
                                            <td><button class="btn btn-primary" onclick="Nopermiso()">Activo </button></td>
                                        @else 
                                            <td><button class="btn btn-danger" onclick="Nopermiso()">Inactivo </button></td>
                                        @endif
                                    @endif
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Contactos
                                            </button>
                                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                @foreach ($usuario->contactos as $contacto) 
                                                    <a class="dropdown-item1" value="{{$contacto->id}}" data-toggle="modal" 
                                                        data-target="#modalContactos" onclick="detallesContacto({{ $contacto->id}})">{{$contacto->nombre}}</a>
                                                @endforeach
                                                @if (Auth::user() && (Auth::user()->rol_id==1))
                                                <a style="color:#ff407b" class="dropdown-item1" data-toggle="modal" 
                                                    data-target="#modalRegistrarContactos" onclick="registrarContactoModal({{$usuario->id}})">Nuevo Contacto</a>
                                                @endif
                                            </div>
                                          </div>
                                    </td>
                                    <td><button class="btn btn-success" data-toggle="modal" 
                                        data-target="#modalDetalles" onclick="detallesUsuario({{ $usuario->id}})">Ver Detalles</button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>       
                </div>      
            </div>
        </div>     
    </div>
    @include('usuarios.modalVerDetalles')
    @include('usuarios.modalContactos')
    @include('usuarios.modalRegistrarContactos')                
@endsection