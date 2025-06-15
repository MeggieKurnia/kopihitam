<?php

namespace AdminApp\Controllers;

use AdminApp\Controllers\CRUDController;

class UserController extends CRUDController{

	public $model = '\App\Models\User';
	public $header = ['name'=>'Username','email'=>'Email'];
	public $orderBy = ["created_at"=>"desc"];
	public $where = ["display"=>"1"];

	function __construct(){
		$this->form = $this->form();
	}

	function _styleAct(){
		return [
			"privillage"=>[
				"class"=>"btn btn-warning",
				"label"=>"Privillage"
			]
		];
	}
	
	function form(){
		return[
			'name'=>[
				'type' => 'text',
				'label' => 'Username',
				'required'=>true
			],
			'email'=>[
				'type'=>'email',
				'label' => 'Email',
				'required'=>true
			],
			'password'=>[
				'type' => 'password',
				'required'=> request()->segment(3) == 'create' ? true : false,
				'use_hash'=>true
			],
		];
	}

}