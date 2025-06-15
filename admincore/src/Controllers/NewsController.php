<?php

namespace AdminApp\Controllers;

use AdminApp\Controllers\CRUDController;

class NewsController extends CRUDController{

	public $model = '\App\Models\News';
	public $header = ['title'=>'Title','image'=>'Image','is_active'=>'Active','post_date'=>'Post Date'];
	public $orderBy = ["created_at"=>"desc"];

	function __construct(){
		$this->form = $this->form();
	}

	function callbackField($row,$key,$val){
		if($key == 'image'){
			return '<img src="'.asset($val).'" width="100" height="100"/>"';
		}
		if($key == 'type'){
			return ($val) ? $val : '-';
		}
		if($key == 'is_active'){
			return ($val) ? 'True' : 'False';
		}
	}

	function form(){
		return[
			'title'=>[
				'type' => 'text',
				'label' => 'Title',
				'required'=>true
			],
			'intro'=>[
				'type' => 'textarea',
				'label' => 'Intro',
				'required'=>true
			],
			'image'=>[
				'type' => 'image',
				'label' => 'Image'
			],
			'description'=>[
				'label'=>'Description',
				'type'=>'textarea',
				'class'=>'ckeditor',
				'required'=>true
			],
			'post_date'=>[
				'type'=>'text',
				'label'=>'Date',
				'class'=>'datepicker'
			],
			'is_active'=>'is_active'
		];
	}


}