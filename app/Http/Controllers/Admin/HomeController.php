<?php

namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class HomeController extends CRUDController{

	function form(){
		return[
			'title_video'=>[
				'type'=>'text',
				'label'=>'Title Video',
				'value'=>Helper::getSetting('home','title_video'),
			],
			'intro_video'=>[
				'type'=>'text',
				'label'=>'Intro Video',
				'required'=>true,
				'value'=>Helper::getSetting('home','intro_video'),
			],
			'link_youtube'=>[
				'type'=>'text',
				'required'=>true,
				'label'=>'Video ID Youtube',
				'value'=>Helper::getSetting('home','link_youtube'),
			],
			'text1'=>[
				'type'=>'text',
				'label'=>'Text Discover',
				'value'=>Helper::getSetting('home','text1')
			],
			'text2'=>[
				'type'=>'text',
				'label'=>'Text Click Here',
				'value'=>Helper::getSetting('home','text2')
			],

			'value'=>[
				'type'=>'widget',
				'label'=>'Widget Value',
				'max'=>4,
				'data'=>[
					[
						'val'=>[
							'type'=>'text',
							'label'=>'Value',
							'required'=>true
						],
						'intro'=>[
							'type'=>'text',
							'label'=>'Intro',
							'multilang'=>true
						]
					]
				]
			],
					
		];
	}
}