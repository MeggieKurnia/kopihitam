<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Client;

class ClientController extends CRUDController{ 

	public $model = '\App\Models\Client';
	public $header = ['image'=>'Image','is_active'=>'Active'];
	//public $orderBy = ['created_at'=>'desc'];

	function __construct(){
		$this->form = $this->form();
	}

	function callbackField($row,$key,$val){
	    if($key == 'is_active')
	        return $val ? 'True' : 'False';
	    if($key == 'image'){
	    	if(file_exists(public_path($val))){
	    		return '<img src="'.asset($val).'" style="width:100px; height:100px;">';
	    	}
	    	return '-';
	    }
	}
		
	function form(){
	    return[
	        'image'=>[
	            'type'=>'image',
	            'label'=>'Image',
	            'required'=>true
	        ],
	        'is_active'=>'is_active'
		];
	}
}