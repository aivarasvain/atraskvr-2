<?php

namespace App\Http\Middleware;

use App\Models\VRUsers;
use App\Models\VRRoles;
use App\Models\VRUsersRolesConnections;
use Closure;

class CheckIfAdmin
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

            if(in_array("super-admin", auth()->user()->rolesConnections->pluck('role_id')->toArray()))
                return $next($request);

        }


        return abort(403, "no permission!");
    }
}
