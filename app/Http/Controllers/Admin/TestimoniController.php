<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Testimoni;

class TestimoniController extends CRUDController{ 

	public $model = '\App\Models\Testimoni';
	public $header = ['title'=>'Title','image'=>'Image','active_home'=>'Active'];
	//public $orderBy = ['created_at'=>'desc'];

	function __construct(){
		$this->form = $this->form();
	}

	function callbackField($row,$key,$val){
	    if($key == 'active_home')
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
			'title'=>[
	    		'type'=>'text',
	    		'label'=>'Title',
	    		'required'=>true
	    	],
	    	'description'=>[
	    		'type'=>'textarea',
	    		'label'=>'Description',
	    		'required'=>true,
	    	],
	        'image'=>[
	            'type'=>'image',
	            'label'=>'Image',
	            'required'=>true
	        ],
	        'testi'=>[
	        	'type'=>'widget',
	        	'label'=>'Testimonials',
	        	'data'=>[
	        		[
		        		'category'=>[
				    		'type'=>'text',
				    		'label'=>'Category',
				    		'required'=>true
		        		],
		        		'clinet'=>[
				    		'type'=>'text',
				    		'label'=>'Client',
				    		'required'=>true
		        		],
		        		'project_date'=>[
				    		'type'=>'text',
				    		'label'=>'Project Date',
				    		'required'=>true
		        		],
		        		'project_url'=>[
				    		'type'=>'text',
				    		'label'=>'Project URL',
				    		'required'=>true
		        		],

		        	]
		        ]
	        	
	        ],
	        'active_home'=>[
	        	'type'=>'select',
	        	'option'=>[
	        		'0'=>'False',
	        		'1'=>'True'
	        	]
	        ]
		];
	}
}