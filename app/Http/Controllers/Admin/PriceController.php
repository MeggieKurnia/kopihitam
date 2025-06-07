<?php 
namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Models\Price;

class PriceController extends CRUDController{ 

	public $model = '\App\Models\Price';
	public $header = ['menus_id'=>'Menu','title'=>'Title','is_active'=>'Active'];
	//public $orderBy = ['created_at'=>'desc'];

	function __construct(){
		$this->form = $this->form();
	}

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

	private function _getMenus(){
	    $res = [];
	    $m = \App\Models\Menus::where('template','service')->orderBy('sequence_date','desc');
	    if($m->count()){
	        foreach($m->get() as $v){
	        	$cek = Price::where('menus_id',$v->id)->count();
	        	if(!$cek <= 4)
	            	$res[$v->id] = $v->label;
	        }
	    }
	    return $res;
	}
		
	function form(){
	    return[
	    	'menus_id'=>[
	    		'label'=>'Menu',
	            'type'=>'select',
	            'option'=>$this->_getMenus(),
	            'required'=>true
	    	],
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
	        'item'=>[
	        	'label'=>'Item',
	        	'type'=>'widget',
	        	'data'=>[
	        		[
		        		'items'=>[
					        'type'=>'text',
					        'label'=>'Items',
					        'required'=>true
					    ],
					]
	        	]
	        ],
	        'link_buy'=>[
	        	'label'=>'Link Buy',
	        	'type'=>'text',
	        	'required'=>true
	        ],
	        'is_active'=>'is_active'
		];
	}
}