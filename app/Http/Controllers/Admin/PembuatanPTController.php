<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\PembuatanPT;

class PembuatanPTController extends CRUDController{ 

	public $model = '\App\Models\PembuatanPT';
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
			'subtitle'=>[
	    		'type'=>'text',
	    		'label'=>'Sub Title',
	    		'required'=>true
	    	],
	    	'intro'=>[
	    		'type'=>'textarea',
	    		'label'=>'Description',
	    		'required'=>true,
	    	],
	        'feat'=>[
	        	'type'=>'widget',
	        	'label'=>'Feature',
	        	'data'=>[
	        		[
	        			'icon'=>[
	        				'label'=>'Icon',
	        				'type'=>'text',
	        				// 'option'=>[
	        				// 	'bi bi-hand-thumbs-up'=>'Hand Thumb',
	        				// 	'bi bi-rocket-takeoff'=>'Rocket Takeoff',
	        				// 	'bi bi-briefcase'=>'Brief Case',
	        				// 	'bi bi-truck'=>'Truck'
	        				// ],
	        				'info'=>'Icon Avail <br/>bi bi-hand-thumbs-up<br/>bi bi-rocket-takeoff<br/>bi bi-briefcase<br/>bi bi-truck<br/>Other Icon See https://icons.getbootstrap.com/'
	        			],
	        			'title'=>[
				    		'type'=>'text',
				    		'label'=>'Title',
				    		'required'=>true
				    	],
				    	'desc'=>[
				    		'type'=>'textarea',
				    		'label'=>'Description',
				    		'required'=>true,
				    	]
	        		]
	        	]
	        ],
	        'is_active'=>'is_active'
		];
	}

	function _script(){
		return '
			$(".btn-danger").remove();
			$(".fa-plus").parent().remove();
		';
	}
}