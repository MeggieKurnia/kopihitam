<?php
if(!defined('admin'))
	define('admin','adminapps');

Route::group(['prefix'=>admin,'middleware'=>['web','nologin']],function(){
	Route::get('login','\\AdminApp\Controllers\\LoginController@getIndex');
	Route::post('/postLogin','\\AdminApp\Controllers\\LoginController@postLogin');
});

Route::group(['prefix'=>admin,'middleware'=>['web','admin']],function(){
		$def = \Config::get('lang')['default'];
        app()->setLocale($def);
		Route::get('logout','\\AdminApp\Controllers\\WelcomeController@getLogout');
	
		Route::get('/','\\AdminApp\Controllers\\WelcomeController@index');
		Route::get('elfinder',function(){
	        return view('vendor.elfinder.elfinder');
	    });
		$route = \Config::get('coreadmin');
		if(!empty($route)){
			if(isset($route['content'])){
				foreach($route['content'] as $m=>$v){
					if(@$v['is_parent'])
						continue;
					foreach($v['route'] as $e=>$l){
						if(in_array($l,['index','delete','create','edit'])){
							if($l == 'delete'){
								Route::delete($m.'/'.$l.'/{id}', @$v['controller'].'@get'.ucfirst($l));
							}else if($l == 'edit'){
								Route::match(['put','post'],$m.'/'.$l.'/{id}', @$v['controller'].'@get'.ucfirst($l));
							}
							else if($l == 'create'){
								Route::match(['get','post'],$m.'/'.$l, @$v['controller'].'@get'.ucfirst($l));
							}
							else if($l == 'index'){
								Route::get($m.'/getListing', @$v['controller'].'@getListing');
								Route::get($m.'/'.$l, @$v['controller'].'@get'.ucfirst($l));
							}
							else{
								Route::get($m.'/'.$l, @$v['controller'].'@get'.ucfirst($l));
							}
						}else if(in_array($l,['setting'])){
							Route::match(['get','post'],$m.'/'.$l, $v['controller'].'@get'.ucfirst($l));
								
						}else{
							Route::get($m.'/'.$l, @$v['controller'].'@get'.ucfirst($l));
						}
					}
				}
			}

			if(isset($route['setting'])){
				foreach($route['setting'] as $m=>$v){
					if(@$v['is_parent'])
						continue;
					foreach($v['route'] as $e=>$l){
						if(in_array($l,['index','delete','create','edit'])){
							if($l == 'delete'){
								Route::delete($m.'/'.$l.'/{id}', $v['controller'].'@get'.ucfirst($l));
							}else if($l == 'edit'){
								Route::match(['put','post'],$m.'/'.$l.'/{id}', $v['controller'].'@get'.ucfirst($l));
							}
							else if($l == 'create'){
								Route::match(['get','post'],$m.'/'.$l, $v['controller'].'@get'.ucfirst($l));
							}
							else if($l == 'index'){
								Route::get($m.'/getListing', $v['controller'].'@getListing');
								Route::get($m.'/'.$l, $v['controller'].'@get'.ucfirst($l));
							}
							else{
								Route::get($m.'/'.$l, $v['controller'].'@get'.ucfirst($l));
							}
						}else if($l == 'privillage'){
							Route::match(['get','post'],$m.'/'.$l, $v['controller'].'@get'.ucfirst($l));	
						}else if(in_array($l,['setting'])){
							Route::match(['get','post'],$m.'/'.$l, $v['controller'].'@get'.ucfirst($l));
						}else{
							Route::get($m.'/'.$l, $v['controller'].'@get'.ucfirst($l));
						}
					}
				}
			}
		}
	
});
