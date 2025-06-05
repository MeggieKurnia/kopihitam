<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $price = \App\Models\Price::whereIsActive(1)->get();
        $pricecv = \App\Models\Pricecv::whereIsActive(1)->get();
        return view('fe.home',compact('price','pricecv'));
    }
}
