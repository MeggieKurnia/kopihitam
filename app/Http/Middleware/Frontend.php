<?php

namespace App\Http\Middleware;

use Closure;

class Frontend
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
            if(request()->segment(1) == null){
                app()->setLocale(app()->getLocale());
            }else{
        	   app()->setLocale(request()->segment(1));
            }
            $s = \App\Helper::getSetting('setting','online');
            if($s == 'off'){
                abort(503);
            }
            return $next($request);
        // }
        
    }
}
