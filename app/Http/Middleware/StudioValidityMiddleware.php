<?php

namespace App\Http\Middleware;

use Closure;

class StudioValidityMiddleware
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
        $user = \Auth::guard('studio_api')->user();
        if(empty($user->membership_till) || $user->membership_till < date('Y-m-d')) {
            return response()->json([
                'success' => false,
                'errors' => new \StdClass(),
                'message' => 'Your account has been expired please renew now.',
		    ], 403);
        }

        if($user->album_credit <= $user->album_created) {
            return response()->json([
                'success' => false,
                'errors' => new \StdClass(),
                'message' => 'Your album credit has been over please contact admin.',
		    ], 403);
        }

        return $next($request);
    }
}
