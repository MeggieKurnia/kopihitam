<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(\Auth::guard('admin')->check()){
            if(request()->segment(2) != null && request()->segment(2) != 'logout'){
               if(request()->segment(3) == 'index'){

                if(
                    !\App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),'index') 
                   
                ){
                    return redirect(admin);
                }
              }else if(request()->segment(3) == 'privillage'){
                if(request()->get('uniq') == auth()->guard('admin')->user()->id)
                    return redirect(admin);

              }else if(request()->segment(3) == 'setting'){
                if(
                    !\App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),'setting') 
                   
                ){
                    return redirect(admin);
                }
              }
            }
            $response = $next($request);
            return $response->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Pragma','no-cache')
                ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
        }
        return redirect(admin.'/login');
    }
}
