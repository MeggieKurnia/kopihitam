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
			]
		];
	}
}