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
        return view('fe.home',compact('menu'));
    }
}
