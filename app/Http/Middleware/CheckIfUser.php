<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUser
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




        if(auth()->user()) {

            $roles = auth()->user()->rolesConnections->pluck('role_id')->toArray();
            if(in_array("user", $roles) or in_array("check-if-user",$roles) or in_array("super-admin",$roles))
                return $next($request);

        }


        return abort(403, "no permission!");





    }
}
