<?php

namespace AdminApp\Controllers;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class PrivillageController extends CRUDController{

	function form(){
		return[
			'favicon'=>[
				'type'=>'image',
				'label'=>'Favicon',
				'required'=>true,
				'value'=>Helper::getSetting('website-setting','favicon')
			],
			'logo'=>[
				'type'=>'image',
				'label'=>'Logo',
				'required'=>true,
				'value'=>Helper::getSetting('website-setting','logo')
			],
			'meta-title'=>[
				'type'=>'text',
				'required'=>true,
				'value'=>Helper::getSetting('website-setting','meta-title')
			],
			'meta-description'=>[
				'type'=>'text',
				'required'=>false,
				'value'=>Helper::getSetting('website-setting','meta-description')
			],
			'meta-image'=>[
				'type'=>'image',
				'required'=>true,
				'value'=>Helper::getSetting('website-setting','meta-image')
			],
			'contact-email-admin'=>[
				'type'=>'text',
				'required'=>true,
				'info'=>'Use ; for multiple email',
				'value'=>Helper::getSetting('website-setting','contact-email-admin')
			],
			'contact-subject-email'=>[
				'type'=>'text',
				'required'=>true,
				'value'=>Helper::getSetting('website-setting','contact-subject-email')
			],
			'contact-desc-user'=>[
				'type'=>'textarea',
				'label'=>'Contact Description for User',
				'required'=>true,
				'class'=>'ckeditor',
				'info'=>'%..% automatic replace input user',
				'value'=>Helper::getSetting('website-setting','contact-desc-user')
			],
			'contact-desc-admin'=>[
				'type'=>'textarea',
				'label'=>'Contact Description for Admin',
				'required'=>true,
				'class'=>'ckeditor',
				'info'=>'%..% automatic replace input user',
				'value'=>Helper::getSetting('website-setting','contact-desc-admin')
			],
		];
	}
}