<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use DB;
use Config;

class AdminAccess
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
      
        if (Session::has('admin_id')) 
        {
            $check = DB::table(Config::get('site.accMdl'))->where('id',Session::get('admin_id'))->first();
            if (!$check) 
            {
                Session::forget('admin_id');
                return redirect(url(admin().'/login'));
            }
            else
            {

            $checkUrl = DB::table(Config::get('site.accMdl'))->where('url',admin())->first();

            if ($checkUrl) 
            {
                return $next($request);
            }
            else
            {
                return abort(404);
            }
            }
        }
        else
        {
            return redirect(url(admin().'/login'));
        }
    }
}
