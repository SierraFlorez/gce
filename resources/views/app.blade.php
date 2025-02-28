
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('partials.htmlheader')
<body>    
    @include('partials.mainheader')
    @include('partials.sidebar')
    <section>
        <div class="dashboard-wrapper imgbackground" style="background-image: url('images/ceaibackground1.png'); background-repeat: no-repeat; background-position: 0% 68%">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    
                    <!-- Your Page Content Here -->
                    @yield('main-content') 
                </div>
            </div>
        </div>
        <br>
    </section>
    @if ((Auth::User())&& (Auth::User()->estado=='0'))
    @php return redirect('/'); @endphp
    @endif
    @if (Auth::User())
        @include('partials.modalCambiarContrasena')
        @include('partials.modalCuenta')
        @include('partials.modalCuentaContacto')
        @include('partials.modalRegistrarContactosUsuario')
    @endif
        @include('partials.footer')
        @include('partials.scripts')
    
</body>
</html>