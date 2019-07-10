<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/empresa/practicas/carga',
        '/empresa/practicas/enviar',
        '/empresa/practicas/mostrar',
        '/empresa/practicas/mostrarR',
        '/empresa/practicas/Accion'
    ];
    
}
