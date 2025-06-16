<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Menus;

class HomeController extends Controller
{
    public function index()
    {
        $menu = Menus::whereTemplate('service')->whereIsActive(1)->whereShowHome(1)->orderBy('sequence_date','desc');
        $client = \App\Models\Client::whereIsActive(1);
        $feature = \App\Models\Feature::whereIsActive(1);
        $testi = \App\Models\Testimoni::whereActiveHome(1)->first();
        $srv = \App\Models\PembuatanPT::whereIsActive(1);
        return view('fe.home',compact('menu','client','feature','testi','srv'));
    }
}
