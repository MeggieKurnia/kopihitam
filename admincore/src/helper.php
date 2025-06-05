<?php 

if(!function_exists('widget')){
	function widget($module,$name,$id){
		$w = App\Models\Widget::where('module',$module)->where('is_active',1)->where('name',$name)->where('base_id',$id)->orderBy('sequence','desc')->orderBy('id')->get();
		$arr = [];
		foreach ($w as $value) {
			$arr[]=$value->detail()->where(function($q){ 
				$q->whereNull('lang');
				$q->orWhere('lang',app()->getLocale()); 
			})->get();
		}
		$ret = [];
		$i=0;
		foreach($arr as $v){
			foreach ($v as $k=>$val) {
				$ret[$i][$val->key] = $val->value;
			}
			$i++;
		}
		return $ret;
	}
}

if(!function_exists('translate')){
	function translate($data,$lang=null){
		$l = !$lang ? app()->getLocale() : $lang;
		return $data->lang()->where('lang',$l)->first();
	}
}

if(!function_exists('urlTrans')){
	function urlTrans($segment=null,$lang=null){
		$l = $lang ? $lang : app()->getLocale();
		return url($l.'/'.$segment);
	}
}

if(!function_exists('getDefaultMeta')){
    function getDefaultMeta() {
        $mt = \App\Helper::getSetting('setting','meta_title') ?? '-';
        $md = \App\Helper::getSetting('setting','meta_desc') ?? '-';
        $mk = \App\Helper::getSetting('setting','meta_keyword') ?? '-';
        $img = \App\Helper::getSetting('setting','meta_img') ?? '-';
        return ['meta_title' => $mt,'meta_desc' => $md,'meta_img'=>$img,'meta_keyword'=>$mk];
    }
}