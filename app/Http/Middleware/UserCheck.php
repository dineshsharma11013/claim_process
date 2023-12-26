<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use DB;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Session::has('user_id') ? Session::get('user_id') : '';
        if ($user) 
        {
            $db = DB::table("user_mdls")->where([['id','=',$user],['deleted','=',2]])->orderBy('id','desc')->first();
            if ($db) 
            {
                return $next($request);
            }
            else
            {
                Session::forget('company_id');
                Session::forget('ip_id');
                Session::forget('user_id');
                Session::forget('form_a');
                return $next($request);
            }
        }
        else
        {
            return $next($request);
        }

        
    }
}
