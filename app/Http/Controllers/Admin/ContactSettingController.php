<?php

namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class ContactSettingController extends CRUDController{

	function form(){
		return[
			'address'=>[
				'type'=>'text',
				'label'=>'Address',
				'required'=>true,
				'value'=>Helper::getSetting('contact','address'),
			],
			'phone'=>[
				'type'=>'text',
				'label'=>'Phone',
				'value'=>Helper::getSetting('contact','phone'),
			    'required'=>true
			],
			'email'=>[
				'type'=>'text',
				'label'=>'Email',
				'value'=>Helper::getSetting('contact','email'),
			    'required'=>true
			],
			'iframe_map'=>[
				'type'=>'textarea',
				'label'=>'Iframe Map',
				'value'=>Helper::getSetting('contact','iframe_map'),
			],
			'template_email'=>[
				'type'=>'textarea',
				'label'=>'Template Email',
				'value'=>Helper::getSetting('contact','template_email'),
				'required'=>true,
				'class'=>'ckeditor'
			]
		];
	}
}