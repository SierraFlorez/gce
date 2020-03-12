<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    // Permite el metodo post
    protected $except = [
        '/passreset/*',
        '/logout',
        // Usuarios
        '/usuarios/detalle/*',
        '/usuarios/update/*',
        '/usuarios/activar/*',
        '/usuarios/inactivar/*',
        '/registrar/guardar/*',
        '/cargaMasiva',
        // Contactos
        '/usuarios/contacto/*',
        '/contacto/update/*',
        '/contacto/guardar/*',

        //
    ];
}
