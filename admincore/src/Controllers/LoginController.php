<?php

namespace AdminApp\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller{

	function getIndex(){
		return view('admin::login');
	}

	function postLogin(){
		$a = [
            'loginUsername'=>'required',
            'loginPassword'=>'required'
        ];
        $v = \Validator::make(request()->all(),$a);
        if($v->fails()){
        	return redirect()->back()->withErrors($v);
        }
        if(env('USE_CAPTCHA',false) && env('CAPTCHA_SECRET',null)){
            ini_set('allow_url_fopen',1);
        	if(!$this->verifyReCaptcha()){
        		return redirect()->back()->with('errData','ReCaptcha Failed');
        	}
        }
		$uname = request()->input('loginUsername');
		$pass = request()->input('loginPassword');
		if(\Auth::guard('admin')->attempt(['name'=>$uname,'password'=>$pass])){
            return redirect(url(admin));
        }
        return redirect()->back()->with('errData','Login Failed');
	}

	function verifyReCaptcha(){
	   // $postdata = http_build_query(["secret"=>env('CAPTCHA_SECRET',null),"response"=>request()->input('g-recaptcha-response')]);
	   // $opts = ['http' =>
	   //     [
	   //         'method'  => 'POST',
	   //         'header'  => 'Content-type: application/x-www-form-urlencoded',
	   //         'content' => $postdata
	   //     ]
	   // ];
	   // $context  = stream_context_create($opts);
	   // $result = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
	   // $check = json_decode($result);
	   // return $check->success;
	   $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret' => env('CAPTCHA_SECRET',null),
            'response' => request()->input('g-recaptcha-response'),
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ]);
        $resp = json_decode(curl_exec($ch));
        curl_close($ch);
        return $resp->success;

	}
}