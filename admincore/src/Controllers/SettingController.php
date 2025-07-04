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

			'sosmed_tw'=>[
				'type'=>'text',
				'label'=>'Link Twitter',
				'value'=>Helper::getSetting('setting','sosmed_tw'),
			],
			'sosmed_fb'=>[
				'type'=>'text',
				'label'=>'Link Facebook',
				'value'=>Helper::getSetting('setting','sosmed_fb'),
			],
			'sosmed_ig'=>[
				'type'=>'text',
				'label'=>'Link Instagram',
				'value'=>Helper::getSetting('setting','sosmed_ig'),
			],
			'sosmed_in'=>[
				'type'=>'text',
				'label'=>'Link Linkedin',
				'value'=>Helper::getSetting('setting','sosmed_in'),
			],

			'copyright'=>[
				'type'=>'text',
				'label'=>'Copyright',
				'value'=>Helper::getSetting('setting','copyright'),
			],

			'link_getstart'=>[
				'type'=>'text',
				'label'=>'Link Get Started',
				'required'=>true,
				'value'=>Helper::getSetting('setting','link_getstart'),
			],

			'wa_text'=>[
				'type'=>'text',
				'label'=>'Whatsapp text Line 1',
				'value'=>Helper::getSetting('setting','wa_text'),
			],
			'wa_text_2'=>[
				'type'=>'text',
				'label'=>'Whatsapp text Line 2',
				'value'=>Helper::getSetting('setting','wa_text_2'),
			],
			'wa_num'=>[
				'type'=>'text',
				'label'=>'Whatsapp Number',
				'value'=>Helper::getSetting('setting','wa_num'),
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