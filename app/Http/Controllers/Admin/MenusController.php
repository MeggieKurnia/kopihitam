<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AdminApp\Controllers\CRUDController;

class MenusController extends CRUDController{

	public $model = '\App\Models\Menus';
	public $header = ['label'=>'Label','template'=>'Template','banner'=>'Banner','is_parent'=>'Parent','sequence_date'=>'Sequence Date','is_active'=>'Active'];
	public $orderBy = ["is_parent"=>"desc","sequence_date"=>"desc"];
	public $where = ['is_parent'=>null];
	

	function __construct(){
		$this->form = $this->form();
		if(isset(request()->get('search')['value'])){
			$this->where = [];
		}
	}

	function callbackField($row,$key,$val){
		if($key == 'is_parent'){
			return $val ? $this->_getMenuById($val) : '-';
		}
		if($key == 'template')
		    return $val ? \Config::get('template')[$val] : '-';
		if($key == 'banner'){
			if($val){
				if(file_exists(public_path(urldecode($val)))){
					return '<img src="'.asset($val).'" width="100" height="100"/>';
				}
				return '-';
			}
			return '-';
		}
		if($key == 'type'){
			return ($val) ? $val : '-';
		}
		if($key == 'template'){
			$tmplate = config()->get('template');
			return isset($tmplate[$val]) ? $tmplate[$val] : '-';
		}
		if($key == 'sequence_date'){
			return $val ? date('d M Y H:i:s', strtotime($val)) : '-';
		}
		if($key == 'is_active')
			return $val ? 'True' : 'False';
	}

	function _styleAct(){
		return [
			"tes"=>[
				"class"=>"btn btn-primary",
				"label"=>"Tes Label"
			]
		];
	}

	function _getMenuById($id){
		$m = \App\Models\Menus::whereId($id)->first();
		if($m){
			return $m->label;
		}
		return '-';
	}

	function _getMenu($id=null){
		$disabled = [];
		if($id){
			$df = \App\Models\Menus::where('is_parent',$id)->get();
			foreach ($df as $f) {
				$disabled[]=$f->id;
			}
		}

		$m = \App\Models\Menus::where('is_parent','')->orWhereNull('is_parent')->where('is_active',1)->orderBy('is_parent')->get();
		$res=[];
		$c=[];
		$d=[];
		foreach ($m as $value) {
			$l = $value->label;
			$res[$value->id] = '<b>'.$l.'</b>';
			$c1 = \App\Models\Menus::where('is_parent',$value->id)->orderBy('is_parent')->where('is_active',1)->get();
			if($c1->count()){
				foreach ($c1 as $ch1) {
					$l2 = $ch1->label;
					$res[$ch1->id][] = $l.'-><b>'.$l2.'</b>';
					$c2 = \App\Models\Menus::where('is_parent',$ch1->id)->where('is_active',1)->orderBy('is_parent')->get();
					if(in_array($ch1->id,$disabled))
						$d[]=$ch1->id;
					if($c2->count()){
						foreach ($c2 as $ch2) {
							$l3 = $ch2->label;
							$res[$ch1->id][$ch2->id][] = $l.'->'.$l2.'-><b>'.$l3.'</b>';
							$d[] = $ch2->id;
						}
					}
				}
			}
		}
		return ['data'=>$res,'disabled'=>$d];
	}

	private function getTemplateAvial()
	{
		if(request()->segment(3) == 'create'){
			$t = \Config::get('template');
			$m = \App\Models\Menus::select('template')->whereIn('template',['about','contact','blog'])->pluck('template')->toArray();
			$res = [];
			foreach($t as $tk=>$ts){
				if(!in_array(strtolower($ts),$m)){
					$res[$tk] = $ts;
				}
			}
			return $res;
		}
		return \Config::get('template');
	}

	function form($id=null){
		$frm = $this->_getMenu($id);
		$tmplate = config()->get('template');
		$r = [
			'is_parent'=>[
				'label'=>'Choose Parent',
				'type'=>'select',
				'dis'=>$frm['disabled'],
				'option'=>$frm['data']
			],
			'template'=>[
				'label'=>'Template Type',
				'type'=>'select',
				'required'=>request()->segment(3) == 'create' ? true : false,
				'option'=>$this->getTemplateAvial()
			],
			'label'=>[
				'type' => 'text',
				'label' => 'Menu Label',
				'class'=>'permalink',
				'required'=>true,
			],
			'banner'=>[
				'type'=>'image',
				'label'=>'Banner',
				'info'=>'size:1920*800px'
			],

			'banner_title'=>[
				'type' => 'text',
				'label' => 'Banner Title',
			],
			'banner_intro'=>[
				'type' => 'text',
				'label' => 'Banner Intro',
			],

			'permalink'=>[
				'type'=>'text',
				'label' => 'Permalink',
				'validate'=>'permalink',
			],
			'position'=>[
				'type'=>'select',
				'label' => 'Position',
				'class' => 'select2',
				'option'=>[
					'main'=>'Main',
					'bottom'=>'Bottom'
				]
			],

			'faq_title'=>[
				'type'=>'text',
				'label'=>'Faq Title',
			],
			
			'faq'=>[
				'label'=>'FAQ',
				'type'=>'widget',
				'data'=>[
					[
						'que'=>[
							'type'=>'text',
							'label'=>'Pertanyaan',
						],
						'ans'=>[
							'type'=>'textarea',
							'label'=>'Jawaban',
						]
					]

				]
			],

			'faq_show_home'=>[
				'type'=>'select',
				'option'=>[
					'0'=>'False',
					'1'=>'True'
				]
			],

			'about_title'=>[
				'type'=>'text',
				'label'=>'About Title'
			],

			'about_image'=>[
				'type'=>'image',
				'label'=>'About Image'
			],
			'content_about'=>[
				'type'=>'widget',
				'label'=>'Content About',
				'data'=>[
					[
						'tab_title'=>[
							'type'=>'text',
							'label'=>'Tab Title'
						],
						'tab_content'=>[
							'type'=>'textarea',
							'class'=>'ckeditor',
							'label'=>'Tab Content'
						],
					]
				]
			],

			'meta_title'=>[
				'type'=>'text',
				'label' => 'Meta/Page Title',
			],
			'meta_description'=>[
				'type'=>'textarea',
				'label' => 'Meta Description',
			],
			'meta_keyword'=>[
				'type'=>'textarea',
				'label' => 'Meta Keyword',
			],
			'meta_img'=>[
		        'label'=>'Meta Image',
		        'type'=>'image',
		        'info'=>'Size'
		    ],
			'show_home'=>[ // only template service
				'label'=>'Show Home',
				'type'=>'select',
				'option'=>["1"=>"True","0"=>"False"]
			],
			'show_started'=>[ // only template service
				'label'=>'Show Get Started',
				'type'=>'select',
				'option'=>["1"=>"True","0"=>"False"]
			],
			'sequence_date'=>[
				'type'=>'text',
				'label'=>'Sequence Date',
				'label'=>' Sequence by Date (The newer will be displayed in upper position)',
				'class'=>'datepicker_seq'
			],
			'is_active'=>'is_active'
		];
		return $r;
	}

	function _script(){
		return "$(document).ready(function(){
						$('.permalink').keyup(function(){
							if($('[name=\"template\"]').val() != 'blank'){
								var v = $(this).val();
								var res = v.replaceAll(' ','-').toLowerCase();
								var name = $(this).attr('name');
								if(name.endsWith('_lang')){
									$('[name=\"permalink_lang\"]').val(res);
								}else{
									$('[name=\"permalink\"]').val(res);
								}
							}
						});
						var e = '".request()->segment(3)."';
	                    
						if(e == 'edit'){
                            $('[name=\"is_parent\"]').parents('.form-group').hide();
                            $('[name=\"is_parent\"]').hide();
                            $('[name=\"use_external_link\"]').parents('.form-group').hide();
                            $('[name=\"use_external_link\"]').prop('disabled',true);
                            setTimeout(function(){
                            	var v = $('[name=\"ext_link\"]').val();
	                            if(v){
	                            	$('[name=\"use_external_link\"]').val('1').trigger('change');
	                            }else{
	                            	$('[name=\"use_external_link\"]').val('0').trigger('change');
	                            	$('[name=\"ext_link\"]').parents('.form-group').hide();
	                           	};
                            },1000);
                            $('[name=\"template\"]').parents('.form-group').hide();
                            $('[name=\"template\"]').hide();
						}
						$('[name=\"template\"]').change(function(){
							if($(this).val() == 'service'){
									$('[name=\"show_home\"]').parents('.form-group').show();
									$('[name=\"show_started\"]').parents('.form-group').show();
									$('.modal-body > div').eq(9).show();
									$('#widgetData_faq').show();
									$('.act-add-faq').parents('.justify-content-md-center').show();
									$('[name=\"faq_title\"]').parents('.form-group').show();
									$('[name=\"faq_show_home\"]').parents('.form-group').show();
									$('.modal-body > div').eq(15).hide();
									$('#widgetData_content_about').hide();
									$('[name=\"about_image\"]').parents('.form-group').hide();
									$('[name=\"about_title\"]').parents('.form-group').hide();
									$('.act-add-content_about').parents('.justify-content-md-center').hide();
								}else{
									$('[name=\"show_home\"]').parents('.form-group').hide();
									$('[name=\"show_started\"]').parents('.form-group').hide();
									$('.modal-body > div').eq(9).hide();
									$('#widgetData_faq').hide();
									$('.act-add-faq').parents('.justify-content-md-center').hide();
									$('[name=\"faq_title\"]').parents('.form-group').hide();
									$('[name=\"faq_show_home\"]').parents('.form-group').hide();
									if($(this).val() == 'about'){
										$('.modal-body > div').eq(15).show();
										$('#widgetData_content_about').show();
										$('[name=\"about_image\"]').parents('.form-group').show();
										$('[name=\"about_title\"]').parents('.form-group').show();
										$('.act-add-content_about').parents('.justify-content-md-center').show();
									}else{
										$('.modal-body > div').eq(15).hide();
										$('#widgetData_content_about').hide();
										$('[name=\"about_image\"]').parents('.form-group').hide();
										$('[name=\"about_title\"]').parents('.form-group').hide();
										$('.act-add-content_about').parents('.justify-content-md-center').hide();
									}
								}
							if($(this).val() == 'blank'){
								$('[name=\"banner\"]').parents('.form-group').hide();
								$('[name=\"permalink\"]').parents('.form-group').hide();
								$('[name=\"meta_title\"]').parents('.form-group').hide();
								$('[name=\"meta_description\"]').parents('.form-group').hide();
								$('[name=\"meta_keyword\"]').parents('.form-group').hide();
								$('[name=\"meta_img\"]').parents('.form-group').hide();
								$('[name=\"banner\"]').val('');
								$('[name=\"permalink\"]').val('');
								$('[name=\"meta_title\"]').val('');
								$('[name=\"meta_description\"]').val('');
								$('[name=\"meta_keyword\"]').val('');
								$('[name=\"meta_img\"]').val('');
							}else{
								$('[name=\"banner\"]').parents('.form-group').show();
								$('[name=\"permalink\"]').parents('.form-group').show();
								$('[name=\"meta_title\"]').parents('.form-group').show();
								$('[name=\"meta_description\"]').parents('.form-group').show();
								$('[name=\"meta_keyword\"]').parents('.form-group').show();
								$('[name=\"meta_img\"]').parents('.form-group').show();
							}
						}).trigger('change');

						setTimeout(function(){
							console.log($('[name=\"position[]\"]').find(':selected'));
							},1000);
					});
				";
	}
}
