<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmInstitution
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
        $group = auth('api')->user()->fk_user_group_id;
        if($group === 3){
            return $next($request);
        }else{
            return response()->json([
                'message' => 'the user does not have permission to the resource'
            ], 404);
        }
    }
}
