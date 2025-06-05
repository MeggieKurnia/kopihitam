<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Projectbisnis;

class PriceController extends CRUDController{ 

	public $model = '\App\Models\Price';
	public $header = ['title'=>'Title','is_active'=>'Active'];
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
	        'harga'=>[
	            'type'=>'text',
	            'label'=>'Harga',
	            'required'=>true
	        ],
	        'harga_coret'=>[
	            'type'=>'text',
	            'label'=>'Harga Coret',
	        ],
	        'is_advance'=>[
	        	'label'=>'Flag Advance?',
	        	'type'=>'select',
	        	'option'=>[
	        		'1'=>'True',
	        		'0'=>'False'
	        	]
	        ],
	        'is_unggulan'=>[
	        	'type'=>'select',
	        	'label'=>'Flag Unggulan?',
	        	'option'=>[
	        		'1'=>'True',
	        		'0'=>'False'
	        	]
	        ],
	        'is_active'=>'is_active'
		];
	}
}