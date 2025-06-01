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
		// 'menus'=>[
		// 	'label'=>'Menus',
		// 	'parent'=>'website-setting',
		// 	'route'=>['index','create','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\MenusController',
		// ],
		'setting'=>[
			'label'=>'Setting',
			'parent'=>'website-setting',
			'route'=>['setting'],
			'controller'=>'\AdminApp\\Controllers\\SettingController',
			'fa'=>'fa fa-gear'
		],
		// 'localization'=>[
		// 	'label'=>'Localization',
		// 	'parent'=>'website-setting',
		// 	'route'=>['setting'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\LocalizationController',
		// 	'fa'=>'fa fa-gear'
		// ],
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

		'section2'=>[
			'label'=>'Section 2',
			'parent'=>'home_content',
			'route'=>['index','edit'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\Section2homeController',
			'fa'=>'fa fa-gear'
		],
		'section3'=>[
			'label'=>'Section 3',
			'parent'=>'home_content',
			'route'=>['index','edit'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\Section3homeController',
			'fa'=>'fa fa-gear'
		],
		'section4'=>[
			'label'=>'Section 4',
			'parent'=>'home_content',
			'route'=>['index','edit'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\Section4homeController',
			'fa'=>'fa fa-gear'
		],
		'section5'=>[
			'label'=>'Section 5',
			'parent'=>'home_content',
			'route'=>['create','index','edit'],
			'controller'=>'\\App\\Http\\Controllers\\Admin\\Section5homeController',
			'fa'=>'fa fa-gear'
		]
	// 	'home'=>[
	// 		'label'=>'Home',
	// 		'fa'=>'fa fa-home',
	// 		'is_parent'=>true
	// 	],
	// 	'slider'=>[
	// 		'label'=>'Slider',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\SliderController',
	// 		'parent'=>'home'	
	// 	],
		
	// 	'about-home'=>[
	// 		'label'=>'About Home',
	// 		'route'=>['index','edit'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\AboutHomeController',
	// 		'parent'=>'home'
	// 	],
	// 	'service-home'=>[
	// 		'label'=>'Service Home',
	// 		'route'=>['index','edit'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\ServiceHomeController',
	// 		'parent'=>'home'
	// 	],
	// 	'facility-home'=>[
	// 		'label'=>'Facilities Home',
	// 		'route'=>['index','edit'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\FacilityController',
	// 		'parent'=>'home'
	// 	],
	// 	'facility-other'=>[
	// 		'label'=>'Facilities Other',
	// 		'route'=>['index','create','edit'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\FacilityOtherController',
	// 		'parent'=>'home'
	// 	],


	// 	'about'=>[
	// 		'label'=>'About',
	// 		'is_parent'=>true
	// 	],
	// 	'history'=>[
	// 		'label'=>'History',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\HistoryHomeController',
	// 		'parent'=>'about'	
	// 	],

	// 	'boc-bod'=>[
	// 		'label'=>'BOC / BOD',
	// 		'is_parent'=>true
	// 	],
	// 	'list_bocbod'=>[
	// 		'label'=>'List BOC/BOD',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\BocBodController',
	// 		'parent'=>'boc-bod'
	// 	],

	// 	'subsidiaries'=>[
	// 		'label'=>'Subsidiaries',
	// 		'is_parent'=>true
	// 	],
	// 	'list_subsidiaries'=>[
	// 		'label'=>'List Subsidiaries',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\SubdiariesController',
	// 		'parent'=>'subsidiaries'
	// 	],

	// 	'prestasi'=>[
	// 		'label'=>'Prestasi',
	// 		'is_parent'=>true
	// 	],
	// 	'list_prestasi'=>[
	// 		'label'=>'List Prestasi',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\PrestasiController',
	// 		'parent'=>'prestasi'
	// 	],

	// 	'service'=>[
	// 		'label'=>'Service',
	// 		'is_parent'=>true
	// 	],
	// 	'list_service'=>[
	// 		'label'=>'Services Gallery',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\ServiceController',
	// 		'parent'=>'service'
	// 	],

	// 	'facility'=>[
	// 		'label'=>'Facilities',
	// 		'is_parent'=>true
	// 	],
	// 	'list_facility'=>[
	// 		'label'=>'List Facilities',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\FacilityDetailController',
	// 		'parent'=>'facility'
	// 	],
	// 	'list_dermaga'=>[
	// 		'label'=>'Facilities Gallery',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\DermagaController',
	// 		'parent'=>'facility'
	// 	],
		
	// 	'media'=>[
	// 		'label'=>'Media',
	// 		'is_parent'=>true
	// 	],
	// 	'news'=>[
	// 		'label'=>'News',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\NewsController',
	// 		'parent'=>'media'
	// 	],
	// 	'gallery_news'=>[
	// 		'label'=>'Gallery News',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\GalleryNewsController',
	// 		'parent'=>'media'
	// 	],
	// 	'csr'=>[
	// 		'label'=>'Gallery CSR',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\CSRController',
	// 		'parent'=>'media'
	// 	],
	// 	'magazine'=>[
	// 		'label'=>'Magazine',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\MagazineController',
	// 		'parent'=>'media'
	// 	],
	// 	'Video'=>[
	// 		'label'=>'Video',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\VideoController',
	// 		'parent'=>'media'
	// 	],
	// 	'gcg'=>[
	// 		'label'=>'GCG',
	// 		'is_parent'=>true
	// 	],
	// 	'report'=>[
	// 		'label'=>'Annual Report',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\AnnualReportController',
	// 		'parent'=>'gcg'
	// 	],
	// 	'soft_gcg'=>[
	// 		'label'=>'Soft Structure GCG',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\SoftgcgController',
	// 		'parent'=>'gcg'
	// 	],
	// 	'blowing-system'=>[
	// 		'label'=>'Blowing System',
	// 		'is_parent'=>true,
	// 	],
	// 	'blowing-system_config'=>[
	// 		'label'=>'Config Page',
	// 		'route'=>['setting'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\BlowingCongifController',
	// 		'parent'=>'blowing-system'
	// 	],
	// 	'blowing-system_submit'=>[
	// 		'label'=>'Form Submit',
	// 		'route'=>['index','detail','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\WbsSubmitController',
	// 		'parent'=>'blowing-system'
	// 	],
	// 	'customer'=>[
	// 		'label'=>'Customer',
	// 		'is_parent'=>true
	// 	],
	// 	'customer_list'=>[
	// 		'label'=>'List Customer',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\CustomerController',
	// 		'parent'=>'customer'
	// 	],
	// 	'contact'=>[
	// 		'label'=>'Contact',
	// 		'is_parent'=>true
	// 	],
	// 	'contact_list'=>[
	// 		'label'=>'List Contact',
	// 		'route'=>['index','create','edit','delete'],
	// 		'controller'=>'\\App\\Http\\Controllers\\Admin\\ContactController',
	// 		'parent'=>'contact'
	// 	],
		// 'news'=>[
		// 	'label'=>'News',
		// 	'route'=>['index','create','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\NewsController',
		// 	'fa'=>'fa fa-newspaper-o',
		// ],
		// 'about'=>[
		// 	'label'=>'About',
		// 	'route'=>['index','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\AboutController',
		// ],
		// 'home'=>[
		// 	'label'=>'Home',
		// 	'is_parent'=>true,
		// ],
		// 'slide'=>[
		// 	'label'=>'Slider',
		// 	'route'=>['index','create','edit','delete'],
		// 	'parent'=>'home',
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\SliderController',
		// ],
		// 'service'=>[
		// 	'label'=>'Service',
		// 	'route'=>['index','create','edit','delete'],
		// 	'parent'=>'home',
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\ServiceController',
		// ],
		// 'client'=>[
		// 	'label'=>'My Client',
		// 	'route'=>['index','create','edit','delete'],
		// 	'parent'=>'home',
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\ClientController',
		// ],
		// 'counter_service'=>[
		// 	'label'=>'Counter Service',
		// 	'route'=>['index','create','edit','delete'],
		// 	'parent'=>'home',
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\CounterServiceController',
		// ],
		// 'contact'=>[
		// 	'label'=>'Contact',
		// 	'is_parent'=>true
		// ],
		// 'contact-page'=>[
		// 	'label'=>'Contact Page',
		// 	'route'=>['index','edit','create','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\ContactController',
		// 	'fa'=>'fa fa-address-book',
		// 	'parent'=>'contact'
		// ],
		// 'contact-submit'=>[
		// 	'label'=>'Contact Submit',
		// 	'route'=>['index','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\PostContactController',
		// 	'fa'=>'fa fa-address-book',
		// 	'parent'=>'contact'
		// ],
		// 'services'=>[
		// 	'label'=>'Services',
		// 	'is_parent'=>true,
		// 	'fa'=>'fa fa-gear'
		// ],
		// 'service-page'=>[
		// 	'label'=>'Service Page',
		// 	'route'=>['index','create','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\ServicePageController',
		// 	'fa'=>'fa fa-gear',
		// 	'parent'=>'services'
		// ],
		// 'service-detail'=>[
		// 	'label'=>'Service Detail',
		// 	'route'=>['index','create','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\ServiceDetailController',
		// 	'fa'=>'fa fa-gear',
		// 	'parent'=>'services'
		// ],
		// 'article'=>[
		// 	'label'=>'Article',
		// 	'route'=>['index','create','edit','delete'],
		// 	'controller'=>'\\App\\Http\\Controllers\\Admin\\ArticleController',
		// 	'fa'=>'fa fa-drivers-license',
		// ]
	]
];