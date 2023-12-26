<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use DB;

class AdminLoginCheck
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
        $url = \Request::segment(1);
        $cat = DB::table("general_info_mdls")->select('url')->where('url',$url)->first(); 

      //  echo $url;die();
        if ($cat) 
        {
        if (Session::has('admin_id')) 
        {
            return redirect(url(admin().'/'));
        }
        else
        {
            return $next($request);
        }
        }
        else
        {
            return redirect('/');
        }
    }
}
