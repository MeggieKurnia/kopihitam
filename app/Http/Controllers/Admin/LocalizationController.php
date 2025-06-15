<?php

namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class LocalizationController extends CRUDController{

	function form(){
		return[
			'get_start'=>[
				'type'=>'text',
				'label'=>'Get Started',
				'value'=>Helper::getSetting('localization','get_start'),
			],
			'wujudkan_impian'=>[
				'type'=>'text',
				'label'=>'Wujudkan Impian',
				'value'=>Helper::getSetting('localization','wujudkan_impian'),
			],
			'buy_now'=>[
				'type'=>'text',
				'label'=>'Buy Now',
				'value'=>Helper::getSetting('localization','buy_now'),
			],
			'faq'=>[
				'type'=>'text',
				'label'=>'Faq',
				'value'=>Helper::getSetting('localization','faq')
			],
			'feture'=>[
				'type'=>'text',
				'label'=>'Feature',
				'value'=>Helper::getSetting('localization','feture')
			],
			'check_feature'=>[
				'type'=>'text',
				'label'=>'Check Feature',
				'value'=>Helper::getSetting('localization','check_feature')
			],
			'why_we'=>[
				'type'=>'text',
				'label'=>'Why We',
				'value'=>Helper::getSetting('localization','why_we')
			],
			'why_we_title'=>[
				'type'=>'text',
				'label'=>'Why We Title',
				'value'=>Helper::getSetting('localization','why_we_title')
			],
			'client'=>[
				'type'=>'text',
				'label'=>'Client',
				'value'=>Helper::getSetting('localization','clinet')
			],
			'testimonial'=>[
				'type'=>'text',
				'label'=>'Testimonial',
				'value'=>Helper::getSetting('localization','testimonial')
			],
			'project_info'=>[
				'type'=>'text',
				'label'=>'Project Information',
				'value'=>Helper::getSetting('localization','project_info')
			],
			'project_cat'=>[
				'type'=>'text',
				'label'=>'Project Category',
				'value'=>Helper::getSetting('localization','project_cat')
			],
			'project_cln'=>[
				'type'=>'text',
				'label'=>'Project Clients',
				'value'=>Helper::getSetting('localization','project_cln')
			],
			'project_date'=>[
				'type'=>'text',
				'label'=>'Project Date',
				'value'=>Helper::getSetting('localization','project_date')
			],
			'project_url'=>[
				'type'=>'text',
				'label'=>'Project URL',
				'value'=>Helper::getSetting('localization','project_url')
			],

		];
	}
}