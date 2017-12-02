<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class AuthSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user())
        {
            return Redirect::to('login')->with([
                'message'=>'Anda harus login terlebih dahulu',
                'type'=>'label-danger',
            ]);
        }
        else
        {
            if(Auth::user()->level != 'SuperAdmin')
            {
                return Redirect::to('login')->with([
                    'message'=>'Anda tidak memiliki hak akses',
                    'type'=>'label-danger',
                ]);
            }
        }
        return $next($request);
    }
    }
}
