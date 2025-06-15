<?php

namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class HomeController extends CRUDController{

	function form(){
		return[
			'images'=>[
				'type'=>'image',
				'label'=>'Images',
				'required'=>true,
				'info'=>'Image Recomended 1920px x 1128px'
			],
			'title'=>[
				'type'=>'text',
				'label'=>'Title',
				'value'=>Helper::getSetting('home','title'),
			],
			'intro'=>[
				'type'=>'text',
				'label'=>'Intro',
				'value'=>Helper::getSetting('home','intro'),
			],
			'text_link'=>[
				'type'=>'text',
				'label'=>'Text Link',
				'value'=>Helper::getSetting('home','text_link'),
			],
			'link'=>[
				'type'=>'text',
				'label'=>'Link',
				'value'=>Helper::getSetting('home','link'),
			],
					
		];
	}
}