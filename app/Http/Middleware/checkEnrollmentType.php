<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use DB;
use Closure;


class checkEnrollmentType
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
        $auth = Auth::user();
        if ($auth && $auth->user_type == '3') {

            if (isset($auth->step)) {

                if ($auth->step == 0 || $auth->steptwo == 0 || $auth->stepthree == 0) {
                    return redirect('/lawyer/enrollment');
                } else {
                    return $next($request);
                }
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}
