<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $section2 = \App\Models\Section2home::whereIsActive(1)->first();
        $widgetSec2 = null;
        if($section2 != null){
            $widgetSec2 = widget('section2','image',$section2->id);
        }

        $sec3 = \App\Models\Section3home::whereIsActive(1)->first();
        $ws3 = null;
        if($sec3 != null){
            $ws3 = widget('section3','image',$sec3->id);
        }

        $sec4 = \App\Models\Section4home::whereIsActive(1)->first();
        $ws4 = null;
        if($sec4 != null){
            $ws4 = widget('section4','image',$sec4->id);
        }
        return view('fe.home',compact('section2','widgetSec2','sec3','ws3','sec4','ws4'));
    }
}
