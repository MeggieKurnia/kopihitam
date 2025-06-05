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
			],
			'meta_title'=>[
				'type'=>'text',
				'label'=>'Meta Title (Default)',
				'value'=>Helper::getSetting('setting','meta_title')
			],
			'meta_desc'=>[
				'type'=>'text',
				'label'=>'Meta Description (Default)',
				'value'=>Helper::getSetting('setting','meta_desc')
			],
			'meta_keyword'=>[
				'type'=>'text',
				'label'=>'Meta Keyword (Default)',
				'value'=>Helper::getSetting('setting','meta_keyword')
			],
			'meta_img'=>[
				'type'=>'image',
				'label'=>'Meta Image',
				'value'=>Helper::getSetting('setting','meta_img')
			],
		];
	}
}