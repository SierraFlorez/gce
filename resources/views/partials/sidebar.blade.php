<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    {{-- style="background-image: url(images/sidebar.png); background-repeat: no-repeat;background-position: center center; display: block;" #1D3E5C !important --}}
    <div class="menu-list">
        <a class="navbar-brand gce" href="{{ url("/") }}">GCE</a> 
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="d-xl-none d-lg-none" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-item ">
                        <a class="nav-link " href="{{ url("/usuarios") }}" data-target="#submenu-1"
                            aria-controls="submenu-1" style="margin-bottom: 10px; color:white;">
                            <p style="font-size:1.09rem"><i class="fas fa-table" style="color:white;"></i>Consultar Usuarios<span
                                class="badge badge-success"></span></p>
                        </a>
                    </li>
                    <br>
                    <br>
                    @if (Auth::user() && (Auth::user()->rol_id==1))
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url("/registrar") }}" data-target="#submenu-1"
                            aria-controls="submenu-1" style="color:white;">
                            <p style="font-size:1.09rem"><i class="fas fa-user-plus" style="color: white;"></i>Registrar Usuarios<span
                                class="badge badge-success">6</span></p>
                        </a>
                        @endif
                    </li>
                    @if (Auth::user())
                    <br>
                    <li class="nav-item">
                        <div class="row">
                        <div class="dropdown invisibles">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->nombres }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width: 62%; ">
                                <button class="dropdown-item" type="button"
                                    onclick='detallesUsuario({{Auth::user()->id}})' data-toggle="modal" href="#"
                                    data-target="#modalCuenta"><i class="fas fa-user mr-2"></i>Cuenta</button>
                                    <hr>
                                <button class="dropdown-item" type="button" data-toggle="modal" href="#"
                                    data-target="#modalPassword"><i class="fas fa-cog mr-2"></i>Cambio de
                                    Contraseña</button>
                                    <hr>
                                <button class="dropdown-item" type="button" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fas fa-power-off mr-2"></i>Cerrar Sesión</button>
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="dropdown invisibles" align="right">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contactos
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width: 62%; ">
                                @foreach (Auth::User()->contactos as $contacto) 
                                <button class="dropdown-item1"  onclick='detallesContactoUsuario({{$contacto->id}})' data-toggle="modal" href="#" data-target="#modalCuentaContacto"><i class="fas fa-id-card-alt"></i>&nbsp;{{$contacto->nombre}}</button>
                                <hr>
                                @endforeach
                                <button class="dropdown-item1" data-toggle="modal" href="#" data-target="#modalRegistrarContactosUsuario"><i class="fas fa-id-card-alt"></i>&nbsp;Nuevo Contacto</button>
                            </div>
                    </li>
                    <br>
                    <li class="nav-item">
                        
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
    </div>
    </nav>
</div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->