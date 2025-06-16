<?php
return[
	'setting'=>[
		'user'=>[
			'label'=>'User',
			'route'=>['index','create','edit','delete','privillage'],
			'controller'=>'\\AdminApp\\Controllers\\UserController',
			'fa'=>'fa fa-user',
		],

		// 'privillage'=>[
		// 	'label'=>'Privillage',
		// 	'route'=>['privillage'],
		// 	'controller'=>'\\AdminApp\\Controllers\\PrivillageController',
		// 	'fa'=>'fa fa-lock',
		// ],

		'website-setting'=>[
			'label'=>'Website Setting',
			'is_parent'=>true,
			// 'route'=>['setting'],
			// 'controller'=>'\\AdminApp\\Controllers\\SettingController',
			'fa'=>'fa fa-globe',
		],
		'menus'=>[
			'label'=>'Menus',
			'parent'=>'website-setting',
			'route'=>['index','create','edit','delete'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\MenusController',
		],
		'setting'=>[
			'label'=>'Setting',
			'parent'=>'website-setting',
			'route'=>['setting'],
			'controller'=>'\AdminApp\\Controllers\\SettingController',
			'fa'=>'fa fa-gear'
		],
		'localization'=>[
			'label'=>'Localization',
			'parent'=>'website-setting',
			'route'=>['setting'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\LocalizationController',
			'fa'=>'fa fa-gear'
		],
		// 'tes'=>[
		// 	'label'=>'Tes',
		// 	'parent'=>'website-setting',
		// 	'route'=>['index','create','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\TesController',
		// ]
	],
	'content'=>[
		'home_content'=>[
			'label'=>'Home',
			'is_parent'=>true
		],
		'home'=>[
			'label'=>'Slider',
			'parent'=>'home_content',
			'route'=>['setting'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\HomeController',
			'fa'=>'fa fa-gear'
		],
		'client'=>[
			'label'=>'Client',
			'parent'=>'home_content',
			'route'=>['create','index','edit','delete'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\ClientController',
			'fa'=>'fa fa-gear'
		],
		'feature'=>[
			'label'=>'Features',
			'parent'=>'home_content',
			'route'=>['create','index','edit','delete'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\FeatureController',
			'fa'=>'fa fa-gear'
		],
		'about'=>[
			'label'=>'About',
			'parent'=>'home_content',
			'route'=>['setting'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\AboutController',
			'fa'=>'fa fa-gear'
		],
		'pembuatan_pt'=>[
			'label'=>'Pembuatan PT',
			'parent'=>'home_content',
			'route'=>['index','edit'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\PembuatanPTController',
			'fa'=>'fa fa-gear'
		],
		'testimoni'=>[
			'label'=>'Testimonials',
			'parent'=>'home_content',
			'route'=>['index','edit'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\TestimoniController',
			'fa'=>'fa fa-gear'
		],
		'price'=>[
			'label'=>'Price',
			'parent'=>null,
			'route'=>['create','index','edit','delete'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\PriceController',
			'fa'=>'fa fa-money'
		],
		'contact'=>[
			'label'=>'Contact Setting',
			'parent'=>null,
			'route'=>['setting'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\ContactSettingController',
			'fa'=>'fa fa-user'
		],
		'contact_submit'=>[
			'label'=>'Contact Submit',
			'parent'=>null,
			'route'=>['index','delete','download'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\ContactSubmitController',
			'fa'=>'fa fa-address-card'
		]
	]
];