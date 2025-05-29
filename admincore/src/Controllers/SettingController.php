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
			
		    'image_popuphome_eng'=>[
		        'type'=>'image',
		        'label'=>'Image Popup Home',
		        'value'=>Helper::getSetting('setting','image_popuphome_eng'),
		        'info'=>'img size: 600*650px'
		    ],

		    'image_popuphome_idn'=>[
		        'type'=>'image',
		        'label'=>'Image Popup Home (Indonesia)',
		        'value'=>Helper::getSetting('setting','image_popuphome_idn'),
		        'info'=>'img size: 600*650px'
		    ],
		    'link_popuphome_eng'=>[
		        'type'=>'text',
		        'label'=>'Link Popup Home',
		        'value'=>Helper::getSetting('setting','link_popuphome_eng'),
		        'info'=>'example : https://google.com'
		    ],

		    'link_popuphome_idn'=>[
		        'type'=>'text',
		        'label'=>'Link Popup Home (Indonesia)',
		        'value'=>Helper::getSetting('setting','link_popuphome_idn'),
		        'info'=>'example : https://google.com'
		    ],
		    
		    'ptname'=>[
		        'type'=>'text',
		        'label'=>'PT Name (footer)',
		        'value'=>Helper::getSetting('setting','ptname')
		    ],
		    'head_office'=>[
		        'type'=>'textarea',
		        'label'=>'Head Office (footer)',
		        'class'=>'ckeditor',
		        'value'=>Helper::getSetting('setting','head_office')
		    ],
		    'business-inquiries'=>[
		        'type'=>'textarea',
		        'label'=>'Business Inquiries (footer)',
		        'class'=>'ckeditor',
		        'value'=>Helper::getSetting('setting','business-inquiries')
		    ],
		    'image_1'=>[
		        'type'=>'image',
		        'label'=>'Image 1(Footer)',
		        'value'=>Helper::getSetting('setting','image_1'),
		        'info'=>'img size: 75*75px'
		    ],
		    'image_2'=>[
		        'type'=>'image',
		        'label'=>'Image 2(Footer)',
		        'value'=>Helper::getSetting('setting','image_2'),
		        'info'=>'img size: 75*75px'
		    ],
		    'image_3'=>[
		        'type'=>'image',
		        'label'=>'Image 3(Footer)',
		        'value'=>Helper::getSetting('setting','image_3'),
		        'info'=>'img size: 75*75px'
		    ],
		    'image_4'=>[
		        'type'=>'image',
		        'label'=>'Image 4(Footer)',
		        'value'=>Helper::getSetting('setting','image_4'),
		        'info'=>'img size: 75*75px'
		    ],
		    'image_5'=>[
		        'type'=>'image',
		        'label'=>'Image 5(Footer)',
		        'value'=>Helper::getSetting('setting','image_5'),
		       	'info'=>'img size: 75*75px'
		    ],
			'copyright'=>[
				'type'=>'textarea',
				'label'=>'Copyright',
				'value'=>Helper::getSetting('setting','copyright')
			],
			'instagram'=>[
				'type'=>'text',
				'label'=>'Link Instagram',
				'value'=>Helper::getSetting('setting','instagram')
			],
			'youtube'=>[
				'type'=>'text',
				'label'=>'Link Youtube',
				'value'=>Helper::getSetting('setting','youtube')
			],
			'linkedin'=>[
				'type'=>'text',
				'label'=>'Link Linkedin',
				'value'=>Helper::getSetting('setting','linkedin')
			],
			'facebook'=>[
				'type'=>'text',
				'label'=>'Link Facebook',
				'value'=>Helper::getSetting('setting','facebook')
			],
			'twitter'=>[
				'type'=>'text',
				'label'=>'Link Twitter',
				'value'=>Helper::getSetting('setting','twitter')
			],
			'meta_title'=>[
				'type'=>'text',
				'label'=>'Meta Title (Default / Home)',
				'multilang'=>true,
				'value'=>Helper::getSetting('setting','meta_title',\Config::get('lang')['default'])
			],
			'meta_desc'=>[
				'type'=>'text',
				'label'=>'Meta Description (Default / Home)',
				'multilang'=>true,
				'value'=>Helper::getSetting('setting','meta_desc',\Config::get('lang')['default'])
			],
			'meta_img'=>[
				'type'=>'image',
				'label'=>'Meta Image',
				'value'=>Helper::getSetting('setting','meta_img')
			],
			'banner_not_found'=>[
				'type'=>'image',
				'label'=>'Banner 404',
				'value'=>Helper::getSetting('setting','banner_not_found'),
				'info'=>'img size: 1366*700px'
			],
			'desc_notfound'=>[
				'type'=>'textarea',
				'class'=>'ckeditor',
				'label'=>'Description 404',
				'value'=>Helper::getSetting('setting','desc_notfound')
			],
			'banner_maintenance'=>[
				'type'=>'image',
				'label'=>'Banner Maintenance',
				'value'=>Helper::getSetting('setting','banner_maintenance'),
				'info'=>'img size: 1366*700px'
			],
			'desc_maintenance'=>[
				'type'=>'textarea',
				'class'=>'ckeditor',
				'label'=>'Description Maintenance',
				'value'=>Helper::getSetting('setting','desc_maintenance')
			],
		    'script_head'=>[
		        'type'=>'textarea',
		        'label'=>'Script Head',
		        'value'=>Helper::getSetting('setting','script_head')
		    ]
		];
	}
}