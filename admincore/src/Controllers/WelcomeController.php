<?php

namespace AdminApp\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller{
	function index(){
		return view('admin::welcome');
	}
	
	function getLogout(){
		\Auth::guard('admin')->logout();
	    return redirect(\URL::previous(admin.'/login'));
	}
}