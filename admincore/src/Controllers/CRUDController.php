<?php

namespace AdminApp\Controllers;

use App\Http\Controllers\Controller;

class CRUDController extends Controller{

	function __set($key,$val){
		$this->{$key} = $val;
	}

	function _get($key){
		return $this->{$key};
	}

	private function getConfig(){
		return \Config::get('coreadmin');
	}

	function getIndex(){
		$conf = isset($this->getConfig()['content'][request()->segment(2)]['route']) ? $this->getConfig()['content'][request()->segment(2)]['route'] : $this->getConfig()['setting'][request()->segment(2)]['route'];
		//if(in_array('edit',$conf) || in_array('delete',$conf)){
			$this->header = array_merge($this->header,['action'=>'Action']);
		//}
		return view('admin::listing',[
				'header'=>$this->header,
				'config'=>$conf,
				//'script'=>method_exists($this,'_script') ? $this->_script() : null
			]);
	}

	function getSetting(){
		$model = new \App\Models\Setting();
		$module = request()->segment(2);
		if(request()->isMethod('get')){
			return view('admin::setting',['form'=>$this->form()]);
		}
		else if(request()->isMethod('post')){
			$req = request()->except(['_token','q']);
			try{
				\DB::transaction(function() use($req,$module,$model){
					$model->whereModule($module)->delete();
					$lang = \Config::get('lang');
					$langDef = \Config::get('lang')['default'];
					$langd = '';
					foreach ($lang as $kl => $vl) {
						if($kl == 'default' || $kl == $langDef){
							continue;
						}
						$langd = $kl;
					}
					foreach ($req as $key => $value) {
						$valLang = \Illuminate\Support\Str::endsWith($key,'_lang');
						$m = new \App\Models\Setting();
						$m->module=$module;
						$m->key=\Illuminate\Support\Str::endsWith($key,'_lang') ? str_replace("_lang", "",$key) : $key;
						$m->value=$value;
						$m->lang = $valLang ? $langd : $langDef;
						$m->save();
					}
				});
				return redirect()->back()->with('ok','Insert Successfully');
			}catch(\Exception $e){
				die($e->getMessage());
			}
		}
	}

	function getPrivillage(){
		if(request()->isMethod('get')){
			$data = \App\Models\User::whereId(request()->get('uniq'));
			$usr = $data->first();
			$res = [];
			foreach($usr->priv as $prv){
				$res[$prv->module][$prv->action] = true;
			} 
			return view('admin::privillage',['data'=>$this->getConfig(),'priv'=>$res,'userId'=>request()->get('uniq')]);
		}else if(request()->ajax()){
			try{
				$userId = request()->input('userId');
				$model = new \App\Privillage();
				$model->where('user_id',$userId)->delete();
				if(request()->input('data')){
					foreach(request()->input('data') as $kd => $vd){
						foreach($vd as $d => $v){
							$arr['action'] = $d;
							$arr['module'] = $kd;
							$arr['user_id'] = $userId;
							$model->create($arr);
							$arr=[];
						}
					}
				}
				return response()->json(['message'=>'Update Successfully','code'=>200]);
			}catch(\Exception $e){
				return response()->json(['message'=>$e->getMessage(),'code'=>500]);
			}
		}else{
			abort(404);
		}
	}

	function getListing(){
		if(request()->ajax()){
			$start = (int)request()->get('start');
			$length = request()->get('length');
			$model = new $this->model;

			$select = array_keys($this->header);
			$conf = isset($this->getConfig()['content'][request()->segment(2)]['route']) ? $this->getConfig()['content'][request()->segment(2)]['route'] : $this->getConfig()['setting'][request()->segment(2)]['route'];
			$urlbase = url(admin.'/'.request()->segment(2));
			$del = null;
			$edit = null;
			$act = null;
			$privDel = \App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),'delete');
			$privEdit = \App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),'edit');
			if(in_array('edit',$conf) || in_array('delete',$conf)){
				if(in_array('delete',$conf) && $privDel){
					$act[] = '<a href="'.$urlbase.'/delete/\','.$model->getKeyName().',\'" class="btn btn-danger" onclick="return crm(this);">Delete</a> &nbsp;';
				}	
				if(in_array('edit',$conf) && $privEdit){				
					$act[] = '<a href="'.$urlbase.'/edit/\','.$model->getKeyName().',\'" class="btn btn-success" onclick="return getEdit(this);">Edit</a> &nbsp;';
				}
				
			}
			$push = null;
			foreach($conf as $r){
				if(!in_array($r,['index','create','delete','edit','download'])){
					$class = "";
					$label = ucfirst($r);
					if(method_exists($this,"_styleAct")){
						if(in_array($r,array_keys($this->_styleAct()))){
							if(in_array("class",array_keys($this->_styleAct()[$r])))
								$class = $this->_styleAct()[$r]['class'];
							if(in_array("label",array_keys($this->_styleAct()[$r])))
								$label = $this->_styleAct()[$r]['label'];
						}
					}
					$f = null;
					if(request()->segment(2) == 'user')
						$f = $this->model::select('id')->get();
					$privAct = \App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),$r,$f);
					if($privAct)
						$act[] ='<a href="'.$urlbase.'/'.$r.'?uniq=\','.$model->getKeyName().',\'" class="'.$class.'">'.$label.'</a>';
					//$act = [\DB::raw('CONCAT(\''.$act[0].$push.'\') as action')];
				}
			}
			if($act){
				$act = [\DB::raw('CONCAT(\''.implode("",$act).'\') as action')];
			}
			//dd($act);
			if($act)
				$select = array_merge($select,$act);
			$a = null;
			$trans = false;
			//dd($a->get()->first()->action);
			if(method_exists($model,'lang')){
				//dd('a');
				if($act)
					$a = $model->select($act);
				$defLang = config()->get('lang');
				$req = request();
				$data = $model->with('lang')
						->whereHas('lang',function($q) use($defLang,$req,$select,$model){
							$q->where('lang',$defLang['default']);
							if($req->get('search')['value'] !== null){
								$q->where(function($q1)use($defLang,$req,$select,$model){
									$search = $req->get('search')['value'];
							 		//dd($defLang);
									foreach($select as $v){
										$type = gettype($v);
										if($type == 'object')
											continue;
										 //dd($q->{$v});
										if($v == 'menuid'){
											$m = \App\Models\MenusLang::select('menus_id')->where('label','LIKE','%'.$search.'%')->whereLang($defLang['default']);
											$mid = [];
											foreach($m->get()->toArray() as $w){
												$mid[] = $w['menus_id'];
											}
											if(count($mid))
												$q1->whereIn('menuid',$mid);
										}
									    if(is_null($model->first()->{$v}))
											$q1->orWhere($v,'LIKE','%'.$search.'%');
										//	dd($q->get());
										//}
									}
								});
							}

						});
				$trans = true;
			}else{
				$data = $model->select($select);
			}
			if(property_exists($this,'orderBy')){
				 foreach($this->orderBy as $k=>$v){
					$data->orderBy($k,$v);
				}
			}
			if(property_exists($this,'where')){
				 foreach($this->where as $k=>$v){
				 	if(in_array($v,['',null])){
				 		$data->where($k,'=','')->orWhereNull($k);
				 	}else
						$data->where($k,$v);
				}
			}

			if(request()->get('search')['value'] !== null){
				$search = request()->get('search')['value'];
				if($trans){
					$data->orWhere(function($q) use($select,$search,$model){
						$keys = property_exists($this,'searchMenus') ? array_keys($this->searchMenus) : [];
						foreach($select as $v){
							$type = gettype($v);
							if($type == 'object')
								continue;
							if(in_array($v,$keys)){
								$sc = isset($this->searchMenus[$v]['searchBy']) ? $this->searchMenus[$v]['searchBy'] : 'label'; 
								$m = $this->searchMenus[$v]['model']::select('id');
								foreach($this->searchMenus[$v] as $kn=>$nd){
									if($kn != 'model' && $kn != 'searchBy'){
										$m->orWhere($kn,$nd);
									}
								}
								$id = [];
								foreach($m->get() as $f){
									if($f->lang()->where('lang',\Config::get('lang')['default'])->where($sc,'like','%'.$search.'%')->count()){
										$id[]=$f->id;
									}
								}
								$q->orWhereIn($v,$id);
							}else{
								if(!is_null($model->first()->{$v})){
									$q->orWhere($v,'LIKE','%'.$search.'%');
								}
							}
							
						}
					});
				}else{
					$data->where(function($q) use($select,$search,$model){
						foreach($select as $v){
							$type = gettype($v);
							if($type == 'object')
								continue;
							if(!is_null($model->first()->{$v})){
								$q->orWhere($v,'LIKE','%'.$search.'%');
							}
						}
					});
				}
			}
			$total_row = $data->count();
			$data = $data->take($length)->skip($start);
			$result_data = $this->renderData($data,$select,$trans);
			if(count($result_data)){
				foreach($result_data as $rk=>$rv){
					if($trans){
						if($act != null){
							$id = $rv[0];
							unset($rv[0]);
							$result_data[$rk] = array_merge($rv,[$model->select($act)->whereId($id)->first()->action]);	
						}
						else{
							unset($rv[0]);
							$result_data[$rk] = array_merge($rv,["-"]);	
						}
					}else{
						if($act != null)
							$result_data[$rk] = $rv;
						else
							$result_data[$rk] = array_merge($rv,["-"]);	
					}
				}
				
			}
			if(request()->segment(2) == 'user' && auth()->guard('admin')->user()->display){
				$res=[];
				foreach ($result_data as $key => $value) {
					foreach($value as $k => $v){
						$l = count($value) - 1;
						if($l == $k){
							$end = end($value);
							$ex = explode("&nbsp;",$end);
							foreach($ex as $r){
								if(strrpos($r,"delete/") !== false){
									$pos = strrpos($r,"delete/") + 7;
									$v = explode(" ",substr($r,$pos));
									$id = substr(@$v[0],0,-1);
									if($id != auth()->guard('admin')->user()->id){
										$res[]=$r;
									}
								}else if(strrpos($r,"privillage?uniq=") !== false){
									$pos = strrpos($r,"privillage?uniq=") + 16;
									$v = explode(" ",substr($r,$pos));
									$id = substr(@$v[0],0,-1);
									if($id != auth()->guard('admin')->user()->id){
										$res[]=$r;
									}
								}else{
									$res[]=$r;
								}
							}
							$result_data[$key][$l] = implode("&nbsp;",$res);
							unset($res);
						}
					}
				}
			}
			if(request()->segment(2) == 'menus'){
				$res=[];
				foreach ($result_data as $key => $value) {
					foreach($value as $k => $v){
						$l = count($value) - 1;
						if($l == $k){
							$end = end($value);
							$ex = explode("&nbsp;",$end);
							foreach($ex as $r){
								if(strrpos($r,"delete/") !== false){
									$pos = strrpos($r,"delete/") + 7;
									$v = explode(" ",substr($r,$pos));
									$id = substr(@$v[0],0,-1);
									$cek = \App\Helper::cekChildExist($id);
									if(!$cek){
										$res[]=$r;
									}
								}else{
									$res[]=$r;
								}
							}
							$result_data[$key][$l] = implode("&nbsp;",$res);
							unset($res);
						}
					}
				}
			}
			$json = [
				'draw'=>(int)request()->get('draw'),
				'recordsTotal'=>$total_row,
				'recordsFiltered'=>$total_row,
				'data'=>$result_data
			];
			return response()->json($json);
		}else{
			abort(404);
		}
	}

	private function renderData($q,$select,$trans = false){
		$data = $q->get();
		$res=[];
		$defLang = config()->get('lang');
		if($trans){	
			foreach($data as $k=>$v){
				$arr = [];
				$len = $v->count();
				$ext = [];
				$i=1;
				$dataArray = $v->toArray();
				$arr[] = $v->id;
				foreach($select as $ky){
					$break = false;
					foreach($dataArray['lang'] as $rl=>$gl){
						if($gl['lang'] == $defLang['default']){
							foreach($gl as $kk=>$vv){
								if($kk == $ky){
									if(method_exists($this,'callbackField')){
										$callMethod = $this->callbackField((Object)$v,$ky,$vv);
										if(empty($callMethod)){
											if(request()->segment(2) == 'menus' && $kk == 'label'){
												$child = \App\Models\Menus::where('is_parent',$gl['menus_id'])->orderBy('sequence_date','desc');
												if($child->count()){
													$d = [];
													foreach($child->get() as $cld){
														$p2 = null;
														$trns = translate($cld,$defLang['default']);
														$c2 = \App\Models\Menus::where('is_parent',$cld->id)->orderBy('sequence_date','desc');
														if($c2->count()){
															$d2=[];
															foreach($c2->get() as $cl2){
																$trns2 = translate($cl2,$defLang['default']);
																$isDel2 = \App\Helper::cekChildExist($cl2->id);
																$tmpl2 = $cl2->template ? \Config::get('template')[$cl2->template] : '-';
																$d2[]=['id'=>$cl2->id,'template'=>$tmpl2,'label'=>$trns2->label,'banner'=>$cl2->banner,'parent'=>$trns->label,'sequence'=>date('d M Y H:i:s',strtotime($cl2->sequence_date)),'is_active'=>($cl2->is_active ? 'True' : 'False'),'is_delete'=>(!$isDel2 ? true : false) ];
															}
															$p2 = $d2;
														}
														$isDel = \App\Helper::cekChildExist($cld->id);
														$tmpl = $cld->template ? \Config::get('template')[$cld->template] : '-';
														$d[] = ['id'=>$cld->id,'template'=>$tmpl,'label'=>$trns->label,'banner'=>$cld->banner,'parent'=>$vv,'sequence'=>date('d M Y H:i:s',strtotime($cld->sequence_date)),'is_active'=>($cld->is_active ? 'True' : 'False'),'is_delete'=>(!$isDel ? true : false),'child'=>$p2];
													}
													$arr[]=$vv."<div style='display:inline-block; margin-left: 16px;' data='".json_encode($d)."' id='id_".$gl['menus_id']."' onclick='showChild(this)'><i class='fa fa-caret-right'></i></div>";
												}else{
													$arr[]=$vv;
												}
											}else{
												$arr[]=$vv;
											}
										}else{
											$arr[] = $callMethod;
										}
									}else{
										$arr[]=$vv == 'null' ? NULL : $vv;
									}
									$break = true;
									break;
								}
							}
							if($break)
								break;
						}
					}

					if($break)
						continue;
					foreach($dataArray as $r=>$g){
						if(!in_array($r,$select))
							continue;
						if(is_string($ky)){
							if($ky == $r){
								if(method_exists($this,'callbackField')){
									$callMethod = $this->callbackField((Object)$v,$r,$g);
									$arr[] = empty($callMethod) ? $g : $callMethod;
								}else{
									$arr[]=$g == 'null' ? NULL : $g;
								}
								break;
							}else{
								continue;
							}
						}else{

						}
					}
				}
				$res[]=$arr;
				//dd($res);
			}
		}else{
			foreach($data->toArray() as $k=>$v){
				$arr = [];
				$len = count($v);
				$i=1;
				foreach($v as $r=>$g){
					if(method_exists($this,'callbackField')){
						$callMethod = $this->callbackField((Object)$v,$r,$g);
						$arr[] = empty($callMethod) ? $g : $callMethod;
					}else{
						$arr[]=$g == 'null' ? NULL : $g;
					}	
				}
				$res[]=$arr;
			}
		}
		return $res;
	}

	function getCreate(){
		if(request()->ajax()){
			if(request()->isMethod('get')){
				return response()->json(
					['form'=>$this->form,
					'script'=>method_exists($this,'_script') ? $this->_script() : null]);
			}
			if(request()->isMethod('post')){
				if(property_exists($this,'model')){
					$request = request()->except(['q','widget','no_use_widget','_token']);
					$form = $this->form;
					$arrLang = [];
					$arrData = [];
					// $this->_saveWidget(request()->only('widget'),'1');
					//dd($request);
					$cek = $this->cekValidate($request);
					if(null === $cek){
						$model = new $this->model();
						foreach($request as $key=>$val){
							if(in_array($key,['is_active']))
								continue;
							if(\Illuminate\Support\Str::endsWith($key,'_lang')){
								$pos = strpos($key,'_lang');
								$field = substr($key,0,$pos);
								$lang = config()->get('lang');
								foreach ($lang as $l => $lv) {
									if($l != 'default' && $l != $lang['default']){
										$arrLang[$l][$field] = $val != '' ? trim(ltrim(rtrim($val))) : NULL;
									}
								}
								continue;
							}
							if($form[$key]['type'] == 'password'){
								if(isset($form[$key]['use_hash'])){
									if($form[$key]['use_hash']){
										$arrData[$key] = \Hash::make($val);
									}else{
										$arrData[$key] = $val;
									}
								}else{
									$arrData[$key] = $val;
								}
							}else if($key == 'sequence'){
								$count = $model->all()->count();
								if($val == ''){
									$arrData[$key] = $count + 1;
								}else{
									$exist = $model->where('sequence',$val)->first();
									if(isset($exist)){
										$tmp = $exist->sequence;
										$model->whereId($exist->id)->update(['sequence'=>$count + 1]);
										$arrData[$key] = $tmp;
									}else{
										$arrData[$key] = $count + 1;
									}
								}
							}else{
								$r = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $val);
								if(\Illuminate\Support\Str::endsWith($key,'_lang')){
									$pos = strpos($key,'_lang');
									$field = substr($key,0,$pos);
									$lang = config()->get('lang');
									foreach ($lang as $l => $lv) {
										if($l != 'default' && $l != $lang['default']){
											$arrLang[$l][$field] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
										}
									}
									
								}else{
									if(isset($form[$key]['multilang'])){
										if($form[$key]['multilang']){
											$lang = config()->get('lang');
											foreach ($lang as $l => $lv) {
												if($l != 'default' && $l == $lang['default']){
													$arrLang[$l][$key] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
												}
											}
										}else{
											if(@$form[$key]['class'] == 'select2'){
												$arrData[$key] = implode(",",$r);
											}else{
												$arrData[$key] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
											}	
										}
									}else{
										if(@$form[$key]['class'] == 'select2'){
											$arrData[$key] = implode(",",$r);
										}else{
											if(in_array($r,['',null]) && $key == 'sequence_date'){
												$r = date('Y-m-d H:i:s');
											}
											$arrData[$key] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
										}
									}
								}
							}
						}
						if(array_key_exists('is_active',$form)){
							$arrData['is_active'] = $request['is_active'];
						}
						
						\DB::beginTransaction();
						try{
						    if(method_exists($this,'before_callback'))
						        $this->before_callback($request,$arrData);
							$save = $model->create($arrData);
							if(count($arrLang)){
								foreach (config()->get('lang') as $l => $lv) {
									if($l != 'default'){
										foreach ($arrLang as $kLang => $vLang) {
											if($l == $kLang){
												$vLang['lang'] = $l;
												$model::find($save->id)->lang()->create($vLang);
											}
										}
									}
								}
							}

							if(request()->has('no_use_widget')){
								foreach(request()->only('no_use_widget')['no_use_widget'] as $b=>$f){	
									if(!isset(request()->only('widget')['widget'][$b])){
										\DB::table('widgets')->where('base_id',$save->id)->where('module',request()->segment(2))->where('name',$b)->delete();
									}
								}
							}
							if(request()->has('widget'))
								$this->_saveWidget(request()->only('widget'),$save->id);
								
							if(request()->segment(2) == 'slider'){
								if(request()->input('type') == 'video'){
									$model::find($save->id)->update(['image'=>null,'image_mobile'=>null]);
								}else{
									$model::find($save->id)->update(['video'=>null]);
								}
							}

							\DB::commit();

							if(method_exists($this,'after_callback'))
								$this->after_callback($request,$save);
						}catch(\Exception $e){
							\DB::rollback();
							return response()->json(['status'=>'err','msg'=>$e->getMessage()]);
						}
						if($save){
							return response()->json(['status'=>'ok','msg'=>'Insert Successfully'],200);
						}
						return response()->json(['status'=>'ok','msg'=>'Insert Successfully'],500);
					}
					return response()->json(['status'=>'err','validate'=>$cek],200);
				}
			}
		}
		abort(404);
	}

	private function _saveWidget($data,$base,$type='create'){
		\DB::beginTransaction();
		try{
			$module = request()->segment(2);
			foreach($data['widget'] as $k=>$v){
				$widget_name = $k;
				if($type == 'edit')
					\App\Models\Widget::where('base_id',$base)->where('module',$module)->where('name',$widget_name)->delete();
				$default_lang = config()->get('lang')['default'];
				$lang_other = \Arr::except(config()->get('lang'),[$default_lang,'default']);
				$lang = false;
				if(isset($data['widget'][$widget_name]) && is_array($data['widget'][$widget_name])){
					$arr = $data['widget'][$widget_name];
					$first = array_key_first($arr);
					$arrLen = count($arr[$first]);
					//dd($arrLen,$arr,$first,$data);
					for($i=0;$i<$arrLen;$i++){
						$sequence = !$arr['sequence'][$i] ? date('Y-m-d H:i:s') : $arr['sequence'][$i];
						$widgetId = \DB::table('widgets')->insertGetId(['base_id'=>$base,'module'=>$module,'name'=>$widget_name,'sequence'=>$sequence,'is_active'=>$arr['is_active'][$i]]);
						foreach ($arr as $key=>$value){
							if(in_array($key,['sequence','is_active']))
								continue;

							if(\Illuminate\Support\Str::endsWith($key,'_lang')){
								$ky = str_replace("_lang","",$key);
								$dataInsert = ['widget_id'=>$widgetId,'key'=>str_replace("_lang","",$key),'value'=>$value[$i],'lang'=>array_keys($lang_other)[0]];
							}else if(isset($arr[$key.'_lang'])){
								$dataInsert = ['widget_id'=>$widgetId,'key'=>$key,'value'=>$value[$i],'lang'=>$default_lang];
							}else{
								$dataInsert = ['widget_id'=>$widgetId,'key'=>$key,'value'=>$value[$i],'lang'=>null];
							}
							\DB::table('widget_value')->insert($dataInsert);
						}
					}
				}
				\DB::commit();
			}
		}catch(\Exception $e){
			\DB::rollback();
			dd($e->getMessage());
		}
	}

	private function cekValidate($req,$id=null){
		$errMsg = [];
		try{
			foreach($req as $k=>$v){
				if($k == 'is_active')
					continue;

				$valLang = \Illuminate\Support\Str::endsWith($k,'_lang');
				if($valLang){
					$pos = strpos($k,'_lang');
					$field = $this->form[substr($k,0,$pos)];
					$r = isset($field['required']) ? $field['required'] : false;
					$val = trim(ltrim(rtrim($v)));
					if($r){
						if(true === $r){
							if(null === $val || $val == ''){
								$errMsg[$k]='This Field is Required';
							}
						}
					}else if(isset($field['required_if'])){
						$con = explode(":",$field['required_if']);
						if(isset($req[$con[0]])){
							$trm = trim(ltrim(rtrim($con[1])));
							if($req[$con[0]] == $trm){
								if(null === $val || $val == ''){
									$errMsg[$k]='This Field is Required';
								}
							}
						}
					}
					continue;
				}
				$field = $this->form[$k];
				
				$r = isset($field['required']) ? $field['required'] : false;
				if(is_array($v)){
					if(count($v)){
						$v = implode(",",$v);
					}else{
						$v = '';
					}
				}
				$val = trim(ltrim(rtrim($v)));
				if(request()->segment(2) == 'menus' && in_array($k,['banner']) ){
					if(request()->has('template') && !in_array(request()->get('template'),['parent','']) ){
						if($val == '')
							$errMsg[$k]='This Field is Required';
					}
				}
				if($r){
					if(true === $r){
						if(null === $val || $val == ''){
							$errMsg[$k]='This Field is Required';
						}
					}
				}
				if(isset($field['required_if'])){
					$con = explode(":",$field['required_if']);
					if(trim($con[1]) == $req[$con[0]]){
						if(null === $val || $val == ''){
							$errMsg[$k]='This Field is Required';
						}
					}
				}
				if($val){
					if($field['type'] == 'email'){
						if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
						  $errMsg[$k] = "Invalid email format";
						}
					}
					if(@$field['type'] == 'number'){
						if(!is_numeric($val)){
							$errMsg[$k] = "Invalid numeric format";
						}
					}
					if(@$field['validate'] == 'permalink'){
						$cek = \App\Helper::cekPermalink($val,$id);
						if($cek){
							$errMsg[$k] = "Permalink already exist";
						}
					}
				}

			}

			if(request()->has('widget')){
				$reqWidget = request()->only('widget')['widget'];
				foreach($this->form as $f=>$fv){
					if(isset($fv['type'])){
						if($fv['type'] == 'widget'){
							if(!isset($reqWidget[$f]))
								continue;
							foreach($fv['data'][0] as $fk=>$fv){
								foreach($reqWidget[$f] as $kw=>$vw){
									if($fk == $kw){
										foreach($vw as $keyw=>$valw){
											if(@$fv['required'] === true){
												if($valw == '' || $valw == null){
													$errMsg['widget'][$f][$fk][$keyw] = 'This Field is Required';
												}
												if(isset($reqWidget[$f][$kw."_lang"])){
													$va = $reqWidget[$f][$kw."_lang"][$keyw];
													if($va == '' || $va == null){
														$errMsg['widget'][$f][$kw."_lang"][$keyw] = 'This Field is Required';		
													}
												}
											}else if(@$fv['required_if']){
												$exp = explode(":",$fv['required_if']);
												if(trim($exp[1]) == $req[$exp[0]]){
													if(isset($reqWidget[$f][$kw."_lang"])){
														$va = $reqWidget[$f][$kw."_lang"][$keyw];
															if($va == '' || $va == null){
																$errMsg['widget'][$f][$kw."_lang"][$keyw] = 'This Field is Required';		
															}
													}
													if($valw == '' || $valw == null){
														$errMsg['widget'][$f][$fk][$keyw] = 'This Field is Required';
													}
												}
											}
										}
									}
								}
							}	
						}
					}
				}
			}

			$c = count($errMsg);
			if($c){
				return $errMsg;
			}
			return null;
		}catch(\Exception $e){
			dd($e->getMessage());
		}
	}




	function getDelete($id){
		if(request()->ajax()){
			if(request()->isMethod('delete')){
				$model = $this->model::findOrFail($id);
				$del = $model->delete();
				if($del){
					$w = \App\Models\Widget::where('base_id',$id)->where('module',request()->segment('2'))->delete();
					return response()->json(['status'=>'ok','msg'=>'Delete Successfully'],200);
				}
				return response()->json(['status'=>'err','msg'=>'Delete Failed'],200);
			}
			abort(404);
		}
		abort(404);
	}

	private function _cekWidget($id){
		$module = request()->segment(2);
		$widget = \App\Models\Widget::where('base_id',$id)->where('module',$module)->orderBy('sequence','desc')->orderBy('id')->get();
		$ret = [];
		foreach($widget as $val){
			$ret[$val->name][]=['data'=>$val->detail()->get()->toArray(),'sequence'=>$val->sequence,'is_active'=>$val->is_active];
		}
		return $ret;

	}

	function getEdit($id){
		if(request()->ajax()){
			if(request()->isMethod('put')){
				$key = new $this->model;
				if(method_exists($key,'lang')){
					$data = $key->with('lang')->whereId($id)->get();
					$res = [];
					$lang = [];
					foreach($data as $k=>$v){
						foreach($v->toArray() as $ky=>$vy){
							if($ky == 'lang'){
								foreach(config()->get('lang') as $kl=>$vl){
									if($kl == 'default')
										continue;
									$lg = $v->lang()->where('lang',$kl)->first()->toArray();
									unset($lg['id']);
									$lang[$kl] = $lg;
								}
								// foreach ($v->lang()->get()->toArray() as $keyLang => $valLang) {
								// 	if($keyLang != 'id'){
								// 		$lang[]=$
								// 	}
								// }
								// echo $vy[0]['label'];	
							}else{
								$res[$ky] = str_replace('"','',$vy);
							}
							// if($ky != 'id')
							// 	$lang[$ky] = $vy;
						}
					}
					if(request()->segment(2) == 'menus'){
						$cek = \App\Helper::cekChildExist($id);
						if($cek){
							$res['disabled'] = true;
						}
					}
					$widget = $this->_cekWidget($id);
					//dd($widget);
					$res['widget'] = $widget;
					$data = array_merge($res,$lang);

					$this->form = array_merge($this->form($id),['dataFormxxx'=>$data,'pkKey'=>$id]);
				}else{
					$model = $this->model::where($key->getKeyName(),$id);
					$data = $model->first()->toArray();
					$data['widget'] = $widget = $this->_cekWidget($id);
					$this->form = array_merge($this->form($id),['dataFormxxx'=>$data,'pkKey'=>$id]);
				}
				return response()->json(['form'=>$this->form,'script'=>method_exists($this,'_script') ? $this->_script() : null],200);
			}else if(request()->isMethod('post')){
				
				try{
					if(property_exists($this,'model')){
						$request = request()->except(['q','widget','no_use_widget','_token']);
						$cek = $this->cekValidate($request,$id);
						if(null === $cek){
							$model = new $this->model();
							$form = $this->form;
							$edit = false;
							if(method_exists($model, 'lang')){
								$arrLang = [];
								$arrData = [];
								foreach($request as $k=>$v){
									if($k == 'is_active')
										continue;
									if(\Illuminate\Support\Str::endsWith($k,'_lang')){
										$pos = strpos($k,'_lang');
										$field = substr($k,0,$pos);
										$lang = config()->get('lang');
										foreach ($lang as $l => $lv) {
											if($l != 'default' && $l != $lang['default']){
												$arrLang[$l][$field] = $v != '' ? trim(ltrim(rtrim($v))) : NULL;
											}
										}
										continue;
									}
									if($form[$k]['type'] == 'password'){
										if(null !== $v || $v != ''){
											if(isset($form[$k]['use_hash'])){
												if($form[$k]['use_hash']){
													$model->{$k} = \Hash::make($v);
												}else{
													$model->{$k} = $v;
												}
											}else{
												$model->{$k} = $v;
											}
										}
									}else if($k == 'sequence'){
										$count = $model->all()->count();
										if($v == ''){
											//$arrData[$k] = $count + 1;
											$exist = $model->where('sequence',$v)->first();
												if(isset($exist)){
													$tmp = $exist->sequence;
													$model->whereId($exist->id)->update(['sequence'=>$count]);
													$arrData[$k] = $tmp;
												}else{
													$arrData[$k] = $count;
												}
										}else{
											if($v > $count){
												//$arrData[$k] = $count + 1;
											}else{
												$exist = $model->where('sequence',$v)->first();
												if($exist != null){
													$old = $model->whereId($id)->first();
													if(isset($exist->sequence)){
														$tmp = $exist->sequence;
														$model->whereId($exist->id)->update(['sequence'=>$old->sequence]);
														$arrData[$k] = $tmp;
													}else{
														$arrData[$k] = $v;
													}
												}
											}
										}
									}else{
										$r = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $v);
										if(\Illuminate\Support\Str::endsWith($k,'_lang')){
											$pos = strpos($k,'_lang');
											$field = substr($k,0,$pos);
											$lang = config()->get('lang');
											foreach ($lang as $l => $lv) {
												if($l != 'default' && $l != $lang['default']){
													$arrLang[$l][$field] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
												}
											}
											
										}else{
											if(isset($form[$k]['multilang'])){
												if($form[$k]['multilang']){
													$lang = config()->get('lang');
													foreach ($lang as $l => $lv) {
														if($l != 'default' && $l == $lang['default']){
															$arrLang[$l][$k] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
														}
													}
												}else{
													if(isset($form[$k]['class'])){
														if($form[$k]['class'] == 'select2'){
															$arrData[$k] = implode(",",$r);
														}else{
															$arrData[$k] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
														}
													}else{
														$arrData[$k] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
													}
												}
											}else{
												if(isset($form[$k]['class'])){
													if($form[$k]['class'] == 'select2'){
														$arrData[$k] = implode(",",$r);
													}else{
														$arrData[$k] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
													}
												}else{
													$arrData[$k] = $r != '' ? trim(ltrim(rtrim($r))) : NULL;
												}
											}
										}
									}
								}
								 
								if(array_key_exists('is_active',$request)){
									$arrData['is_active'] = $request['is_active'];
								}

								\DB::beginTransaction();
								try{
									if(request()->segment(2) == 'menus'){
										if(!request()->input('position')){
											$arrData['position'] = NULL;
										}
									}
									if(count($arrData))
									   $edit = $model->whereId($id)->update($arrData);
									if(count($arrLang)){
										foreach($arrLang as $kl=>$vl){
											$model->find($id)->lang()->where('lang',$kl)->update($vl);
										}
									}
									if(request()->has('no_use_widget')){
										foreach(request()->only('no_use_widget')['no_use_widget'] as $b=>$f){	
											if(!isset(request()->only('widget')['widget'][$b])){
												\DB::table('widgets')->where('base_id',$id)->where('module',request()->segment(2))->where('name',$b)->delete();
											}
										}
									}
									if(request()->has('widget'))
										$this->_saveWidget(request()->only('widget'),$id,'edit');								
                                    
                                    if(request()->segment(2) == 'slider'){
										if(request()->input('type') == 'video'){
											$model::find($id)->update(['image'=>null,'image_mobile'=>null]);
										}else{
											$model::find($id)->update(['video'=>null]);
										}
									}
                                    
									\DB::commit();
								}catch(\Exception $e){
									\DB::rollback();
									return response()->json(['status'=>'err','msg'=>$e->getMessage()]);
								}
							}else{
								$key = $model->getKeyName();
								foreach($request as $k=>$v){
									if(in_array($k,['is_active']))
										continue;
									if(isset($form[$k]['type'])){
										if(@$form[$k]['type'] == 'password'){
											if(null !== $v || $v != ''){
												if(isset($form[$k]['use_hash'])){
													if($form[$k]['use_hash']){
														$model->{$k} = \Hash::make($v);
													}else{
														$model->{$k} = $v;
													}
												}else{
													$model->{$k} = $v;
												}
											}
										}else{
											$model->{$k} = $k ? $v : NULL;
										}
									}else{
										$model->{$k} = $v;
									}
								}
								if(array_key_exists('is_active',$request)){
									$arrData['is_active'] = $request['is_active'];
								}
								$model->{$key} = $id;
								$model->exists = true;
								$edit = $model->save();

								if(request()->has('widget'))
									$this->_saveWidget(request()->only('widget'),$id,'edit');
							}
							return response()->json(['status'=>'ok','msg'=>'Update Successfully'],200);
						}else{
							return response()->json(['status'=>'err','validate'=>$cek],200);
						}
					}else{
						return response()->json(['status'=>'err','msg'=>'error']);
					}
				}catch(\Exception $er){
					return response()->json(['status'=>'err','msg'=>$er->getMessage()]);
				}
			}
		}
	}

	function getDownload(){
		if(property_exists($this,'model')){
			$nama_file = 'export_excel_'.date('YmdHis').'.xlsx';
			if(property_exists($this,'header')){
				return \Excel::download(new \AdminApp\Controllers\ExportController($this->model,$this->header,property_exists($this,'orderBy') ? $this->orderBy : ''), $nama_file);
			}else{
				return \Excel::download(new \AdminApp\Controllers\ExportController($this->model,null,property_exists($this,'orderBy') ? $this->orderBy : ''), $nama_file);
			}
		}
	}
}