<?php

namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class AboutController extends CRUDController{

	function form(){
		return[
			'section_left'=>[
				'type'=>'textarea',
				'label'=>'Section Left',
				'value'=>Helper::getSetting('about','section_left'),
				'class'=>'ckeditor',
				'required'=>true,
			],
			'image'=>[
				'type'=>'image',
				'label'=>'Image Center',
				'value'=>Helper::getSetting('about','image'),
			],
			'section_right'=>[
				'type'=>'textarea',
				'label'=>'Section Right',
				'value'=>Helper::getSetting('about','section_right'),
				'class'=>'ckeditor',
				'required'=>true,
			],
			'active'=>[
				'type'=>'select',
				'label'=>'Active in Home',
				'value'=>Helper::getSetting('about','active'),
				'option'=>[
					'0'=>'False',
					'1'=>'True'
				]
			]
		];
	}
}