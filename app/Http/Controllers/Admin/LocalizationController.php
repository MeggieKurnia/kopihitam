<?php

namespace App\Http\Controllers\Admin;

use AdminApp\Controllers\CRUDController;
use App\Helper;

class LocalizationController extends CRUDController{

	function form(){
		return[
			'paket_pt'=>[
				'type'=>'text',
				'label'=>'Paket PT',
				'value'=>Helper::getSetting('localization','paket_pt'),
			],
			'paket_cv'=>[
				'type'=>'text',
				'label'=>'Paket CV',
				'value'=>Helper::getSetting('localization','paket_cv'),
			],
			'buy_now'=>[
				'type'=>'text',
				'label'=>'Buy Now',
				'value'=>Helper::getSetting('localization','buy_now'),
			],
		];
	}
}