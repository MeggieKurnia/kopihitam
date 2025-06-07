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
            $menuMain = \App\Helper::getMenusMain();
            view()->share('menuMain',$menuMain);

            $activeMenu = \App\Models\Menus::where('permalink',request()->segment(1))->where('template','<>','blank')->whereIsActive(1);
            $meta = getDefaultMeta();
            if($activeMenu->count()){
                $dataMenu = $activeMenu->first();
                $meta = \App\Helper::getMetaPage($dataMenu);
            }
            view()->share('meta',$meta);
            return $next($request);
        // }
        
    }
}
