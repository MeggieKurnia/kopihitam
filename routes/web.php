<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['fe']],function(){
	Route::get('/', [App\Http\Controllers\Frontend\HomeController::class,'index']);
	$m = \App\Helper::getMenus();
	if($m->count()){
		foreach($m as $mm){
			if($mm->template == 'parent' || $mm->template == '')
				continue;
			if($mm->permalink != null)
				Route::get($mm->permalink,'\\App\\Http\\Controllers\\Frontend\\MainController@getIndex');
		}
	}
	Route::post('postContact',[App\Http\Controllers\Frontend\MainController::class,'postContact']);
});


