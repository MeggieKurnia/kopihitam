<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menus;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    function getIndex(){
    	$data = Menus::where('permalink',request()->segment(1))->whereIsActive(1);
    	if($data->count()){
    		if($data->first()->template == 'service'){
    			return $this->_service($data->first());
    		}else if($data->first()->template == 'contact'){
    			$data = $data->first();
    			return view('fe.contact',compact('data'));
    		}else if($data->first()->template == 'about'){
                $data = $data->first();
                return view('fe.about',compact('data'));
            }else if($data->first()->template == 'blog'){
                $data = $data->first();
                return view('fe.blog',compact('data'));
            }
    	}else{
    		abort(404);
    	}
    }

    public function _service($data)
    {
    	$price = \App\Models\Price::where('menus_id',$data->id);
    	return view('fe.service',compact('price','data'));
    }

    public function postContact()
    {
        // $rules = [
        //     'name'=>'required',
        //     'email'=>'email|required',
        //     'subject'=>'required',
        //     'message'=>'required'
        // ];
        // $v = \Validator::make(request()->all(),$rules);
        // if($v->fails()){
        //     return redirect()->back()->withErrors($v)->withInput();
        // }
        \DB::beginTransaction();
        try{
            $c = new \App\Models\ContactSubmit();
            $c->name = htmlspecialchars(request()->input('name'));
            $c->email = htmlspecialchars(request()->input('email'));
            $c->subject = htmlspecialchars(request()->input('subject'));
            $c->message = htmlspecialchars(request()->input('message'));
            $c->save();
            $txt = \App\Helper::getSetting('contact','template_email');
            $txt = str_replace("%name%",$c->name,$txt);
            $txt = str_replace("%email%",$c->email,$txt);
            Mail::send('emails', ['data'=>$txt], function ($message) {
                // Setting the recipient, subject, etc.
                $message->to(request()->input('email'), 'No Replay');
                $message->subject('Contact Submit');
                // You can also use cc(), bcc(), from(), replyTo() within the closure
            });
            \DB::commit();
            return response()->json(['status'=>true,"message"=>"Thank You for Submit"]);
        }catch(\Exception $er){
            \DB::rollback();
            return response()->json(['status'=>false,"message"=>"Upss, Something wrong"]);
        }

    }
}
