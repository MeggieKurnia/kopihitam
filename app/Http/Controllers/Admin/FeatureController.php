<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Feature;

class FeatureController extends CRUDController{ 

	public $model = '\App\Models\Feature';
	public $header = ['feature'=>'Feature','image'=>'Image','is_active'=>'Active'];
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
	    	'feature'=>[
	    		'type'=>'text',
	    		'label'=>'Feature',
	    		'required'=>true
	    	],
			'title'=>[
	    		'type'=>'text',
	    		'label'=>'Title',
	    		'required'=>true
	    	],
	    	'description'=>[
	    		'type'=>'textarea',
	    		'label'=>'Description',
	    		'required'=>true,
	    		'class'=>'ckeditor'
	    	],
	        'image'=>[
	            'type'=>'image',
	            'label'=>'Image',
	            'required'=>true
	        ],
	        'is_active'=>'is_active'
		];
	}
}