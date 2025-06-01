<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Projectbisnis;

class Section2homeController extends CRUDController{ 

	public $model = '\App\Models\Section2home';
	public $header = ['title'=>'Title'];
	//public $orderBy = ['created_at'=>'desc'];

	function __construct(){
		$this->form = $this->form();
	}

	function callbackField($row,$key,$val){
	    if($key == 'is_active')
	        return $val ? 'True' : 'False';
	}
		
	function form(){
	    return[
	        'title'=>[
	            'type'=>'text',
	            'label'=>'Title',
	            'required'=>true
	        ],
	        'image'=>[
	            'type'=>'widget',
	            'label'=>'Image',
	            'data'=>[
	                [
	                   'images'=>[
							'type'=>'image',
							'label'=>'Images',
						]
	                    
	                ]
	            ]
	        ],
	        'is_active'=>'is_active'
		];
	}
}