<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\ContactSubmit;

class ContactSubmitController extends CRUDController{ 

	public $model = '\App\Models\ContactSubmit';
	public $header = ['name'=>'Name','email'=>'Email','subject'=>'Subject','message'=>'Message'];
	//public $orderBy = ['created_at'=>'desc'];


	function callbackField($row,$key,$val){
	    if($key == 'is_active')
	        return $val ? 'True' : 'False';
	    if($key == 'menus_id'){
            $m = \App\Models\Menus::whereId($val)->first();
            if($m)
                return $m->label;
            return '-';
        }
	}
}