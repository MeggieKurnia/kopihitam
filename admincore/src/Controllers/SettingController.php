<?php

namespace AdminApp\Controllers;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class SettingController extends CRUDController{

	function form(){
		return[
			'online'=>[
				'type'=>'select',
				'label'=>'Online',
				'required'=>true,
				'option'=>[
					'on'=>'On',
					'off'=>'Off'
				],
				'value'=>Helper::getSetting('setting','online'),
			],
			'favicon'=>[
				'type'=>'image',
				'label'=>'Favicon',
				'value'=>Helper::getSetting('setting','favicon'),
				'info'=>'size:32*32px',
			    'required'=>true
			],
			'logo'=>[
				'type'=>'image',
				'label'=>'Logo',
				'required'=>true,
				'value'=>Helper::getSetting('setting','logo'),
				'info'=>'size:168*40px',
			    'required'=>true
			]
		];
	}
}