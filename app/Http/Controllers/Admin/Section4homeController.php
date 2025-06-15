<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Projectbisnis;

class Section4homeController extends CRUDController{ 

	public $model = '\App\Models\Section4home';
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
	        'image'=>[
	            'type'=>'widget',
	            'label'=>'Image',
	            'data'=>[
	                [
	                   'images'=>[
							'type'=>'image',
							'label'=>'Images',
						],
						'title'=>[
					        'type'=>'text',
					        'label'=>'Title',
					        'required'=>true
					    ],
					    'intro'=>[
				            'type'=>'text',
				            'label'=>'Intro',
				            'required'=>true
				        ],
				        'box1_title'=>[
				        	'type'=>'text',
				            'label'=>'Box 1 Title',
				            'required'=>true
				        ],
				         'box1_persen'=>[
				        	'type'=>'text',
				            'label'=>'Box 1 Persen',
				            'required'=>true
				        ],
				        'box2_title'=>[
				        	'type'=>'text',
				            'label'=>'Box 2 Title',
				            'required'=>true
				        ],
				         'box2_persen'=>[
				        	'type'=>'text',
				            'label'=>'Box 2 Persen',
				            'required'=>true
				        ],
				        'box3_title'=>[
				        	'type'=>'text',
				            'label'=>'Box 3 Title',
				            'required'=>true
				        ],
				         'box3_persen'=>[
				        	'type'=>'text',
				            'label'=>'Box 3 Persen',
				            'required'=>true
				        ]
	                    
	                ]
	            ]
	        ],
	        'is_active'=>'is_active'
		];
	}
}