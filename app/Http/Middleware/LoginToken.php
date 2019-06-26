<?php

namespace App\Http\Middleware;

use Closure;
use blog;


class LoginToken
{
    public function handle($request, Closure $next)
    {

        $Rurl= \Request::getRequestUri();
    }
}