<?php
namespace App;
use App\Models\Setting;

class Helper{
	static function replaceImage(&$a,$k){
        $a->map(function($i,$v)use($k){
           if(file_exists(public_path(urldecode($i->{$k})))){
               $i->{$k} = base64_encode(file_get_contents(public_path(urldecode($i->{$k}))));
           }
        });
    }

    static function getSetting($module,$key,$lang=null){
      if($lang){
      	$data =  Setting::select('value')->whereModule($module)->where('key',$key)->where('lang',$lang);
      }else{
        $data =  Setting::select('value')->whereModule($module)->where('key',$key);
      }
    	return $data->count() ? $data->first()->value : null;

    }

    static function getPriv($userId, $module ,$action,$idU = null){
      if(!auth()->guard('admin')->user()->display) {
        return 1;
      }
      
      $priv = \App\Models\Privillage::where('user_id',$userId)->where('module',$module)->where('action',$action)->count();
      
      return $priv;
    }

    static function getDataUser($id){
      return \App\Models\User::whereId($id)->first();
    }

    static function getMenusMain(){
      return \App\Models\Menus::where('is_active',1)->where('position','LIKE','%main%')->orderBy('sequence_date','desc')->orderBy('id')->get();
    }    

    static function getMenus(){
      return \App\Models\Menus::where('is_active',1)->orderBy('sequence_date','desc')->orderBy('id')->get();
    }

    static function menuMainLeft(){
        return \App\Models\Menus::where('is_active',1)->where('position','like','%left%')->orderBy('sequence_date','desc')->orderBy('id')->get();
    }
    
    static function menuMainRight(){
        return \App\Models\Menus::where('is_active',1)->where('position','like','%right%')->orderBy('sequence_date','desc')->orderBy('id')->get();
    }

    static function menuFooter(){
        return \App\Models\Menus::where('is_active',1)->where('position','like','%bottom%')->orderBy('sequence_date','desc')->orderBy('id')->get();
    }

    static function getMenuChildById($id){
      $p = \App\Models\Menus::where('is_active',1)->where('is_parent',$id)->orderBy('sequence_date','desc')->orderBy('id')->first();
      if($p){
          if($p->lang()->where('lang',app()->getLocale())->first()->permalink){
            return [
                "permalink"=>$p->lang()->where('lang',app()->getLocale())->first()->permalink,
                "label"=>$p->lang()->where('lang',app()->getLocale())->first()->label,
              ];
          }else{
            $p2 = \App\Models\Menus::where('is_active',1)->where('is_parent',$p->id)->orderBy('sequence_date','desc')->orderBy('id')->first();
            return [
                "permalink"=>$p2->lang()->where('lang',app()->getLocale())->first()->permalink,
                "label"=>$p2->lang()->where('lang',app()->getLocale())->first()->label,
              ];
          }
      }
      return null;
    }

    static function getChildMenus($id){
      return \App\Models\Menus::where('is_active',1)->where('is_parent',$id)->orderBy('sequence_date','desc')->orderBy('id')->get();
    }

    static function getBreadcrumb($r=null){
      $f = !$r ? request()->segment(2) : $r;
      $p = \App\Models\MenusLang::select('menus_id')->where('permalink',$f)->first();
      $res = [];
      if($p){
        $m = \App\Models\Menus::whereId($p->menus_id)->where('is_active',1)->first();
        $menuId = $m->id;
        $loop = true;
        do{
          $pr = \App\Models\Menus::whereId($menuId)->where('is_active',1)->first();
          if($pr){
            if($pr->is_parent != '' || !is_null($pr->is_parent)){
              $res[]=[
                "permalink"=>$pr->lang()->where('lang',app()->getLocale())->first()->permalink,
                "title"=>$pr->lang()->where('lang',app()->getLocale())->first()->label,
                "id"=>$pr->id,
                "template"=>$pr->template
              ];
              $menuId = $pr->is_parent;
            }else{
              $res[]=[
                "permalink"=>$pr->lang()->where('lang',app()->getLocale())->first()->permalink,
                "title"=>$pr->lang()->where('lang',app()->getLocale())->first()->label,
                "id"=>$pr->id,
                "template"=>$pr->template
              ];
              $loop = false;
            }
          }else{
            $loop = false;
          }
        }while($loop);
      }
      $p = \App\Models\CareerLang::where('permalink',$f)->first();
      if($p){
        $ex = \App\Models\Career::whereId($p->career_id)->first();
        $m = \App\Models\Menus::whereId($ex->menuid)->where('is_active',1)->first();
        $menuId = $m->id;
        $loop = true;
        do{
          $pr = \App\Models\Menus::whereId($menuId)->where('is_active',1)->first();
          if($pr){
            if($pr->is_parent != '' || !is_null($pr->is_parent)){
              $res[]=[
                "permalink"=>$pr->lang()->where('lang',app()->getLocale())->first()->permalink,
                "title"=>$pr->lang()->where('lang',app()->getLocale())->first()->label,
                "id"=>$pr->id,
                "template"=>$pr->template
              ];
              $menuId = $pr->is_parent;
            }else{
              $res[]=[
                "permalink"=>$pr->lang()->where('lang',app()->getLocale())->first()->permalink,
                "title"=>$pr->lang()->where('lang',app()->getLocale())->first()->label,
                "id"=>$pr->id,
                "template"=>$pr->template
              ];
              $loop = false;
            }
          }else{
            $loop = false;
          }
        }while($loop);
        if(count($res)){
          $a=[
            'title'=>$ex->position,
            'permalink'=>null,
            'id'=>null,
            'template'=>null
          ];
          array_unshift($res,$a);
        }
      }
      //dd($res);
      return $res;
    }

    static function getMenusTrans($lang){
      $m =  \App\Models\MenusLang::where('permalink',request()->segment(2))->first();
      if($m){
        $r = \App\Models\MenusLang::where('menus_id',$m->menus_id)->where('lang',$lang)->first();
        if($r)
          return $r->permalink;
      }
      $n = \App\Models\NewsLang::where('permalink',request()->segment(2))->first();
      if($n){
        $f = \App\Models\NewsLang::where('news_id',$n->news_id)->where('lang',$lang)->first();
        if($f)
          return $f->permalink;
      }
      $n =  \App\Models\CareerLang::where('permalink',request()->segment(2))->first();
      if($n){
        $f = \App\Models\CareerLang::where('career_id',$n->career_id)->where('lang',$lang)->first();
        if($f)
          return $f->permalink;
      }
      return '';
    }

    static function getNavMenu($r=null){
      $f = !$r ? request()->segment(2) : $r;
      $p = \App\Models\MenusLang::select('menus_id')->where('permalink',$f)->first();
      if($p){
          $s = false;
          $menuId = $p->menus_id;
          do{
            $f = \App\Models\Menus::whereId($menuId)->where('is_active',1)->orderBy('sequence_date','desc')->first();
            if(isset($f->is_parent)){
              $menuId = $f->is_parent;
              if($f->is_parent == '' || is_null($f->is_parent)){
                $menuId = $f->id;
                $s = true;
              }
            }else{
              $s=true;
            }
          }while(!$s);
          $m = \App\Models\Menus::whereId($menuId)->where('is_active',1)->orderBy('sequence_date','desc')->first();
          $parentId = $menuId;
          if($parentId){
            $mp = \App\Models\Menus::whereId($parentId)->orderBy('sequence_date','desc')->where('is_active',1)->orderBy('sequence_date','desc')->get();
            $m2 = \App\Models\Menus::where('is_parent',$parentId)->where('is_active',1)->orderBy('sequence_date','desc')->get();
            $res = [];
            foreach ($m2 as $value) {
              $r = [];
              $cekChild = \App\Models\Menus::where('is_parent',$value->id)->where('is_active',1)->orderBy('sequence_date','desc')->get();
              if($cekChild->count()){
                foreach ($cekChild as $value2) {
                  $r[] = [
                    'template'=>$value2->template,
                    'ext_link'=>$value2->ext_link,
                    'permalink'=>$value2->lang()->where('lang',app()->getLocale())->first()->permalink,
                    'title'=>$value2->lang()->where('lang',app()->getLocale())->first()->label
                  ];
                }
              }
              $res[] = [
                'template'=>$value->template,
                'ext_link'=>$value->ext_link,
                "permalink"=>$value->lang()->where('lang',app()->getLocale())->first()->permalink,
                "title"=>$value->lang()->where('lang',app()->getLocale())->first()->label,
                "child"=>$r
              ];
            }
            if($mp->count()){
              return ["parent"=>['label'=>$mp->first()->lang()->where('lang',app()->getLocale())->first()->label,'id'=>$mp->first()->id],'child'=>$res];
            }else{
              return ['parent'=>'-','child'=>$res];
            }
          }
          return [];
      }
      $p = \App\Models\CareerLang::where('permalink',$f)->first();
      if($p){
          $s = false;
          $cx = \App\Models\Career::where('id',$p->career_id)->first();
          $menuId = $cx->menuid;
          do{
            $f = \App\Models\Menus::whereId($menuId)->where('is_active',1)->orderBy('sequence_date','desc')->first();
            if(isset($f->is_parent)){
              $menuId = $f->is_parent;
              if($f->is_parent == '' || is_null($f->is_parent)){
                $menuId = $f->id;
                $s = true;
              }
            }else{
              $s=true;
            }
          }while(!$s);
          $m = \App\Models\Menus::whereId($menuId)->where('is_active',1)->orderBy('sequence_date','desc')->first();
          $parentId = $menuId;
          if($parentId){
            $mp = \App\Models\Menus::whereId($parentId)->orderBy('sequence_date','desc')->where('is_active',1)->orderBy('sequence_date','desc')->get();
            $m2 = \App\Models\Menus::where('is_parent',$parentId)->where('is_active',1)->orderBy('sequence_date','desc')->get();
            $res = [];
            foreach ($m2 as $value) {
              $r = [];
              $cekChild = \App\Models\Menus::where('is_parent',$value->id)->where('is_active',1)->orderBy('sequence_date','desc')->get();
              if($cekChild->count()){
                foreach ($cekChild as $value2) {
                  $r[] = [
                    'ext_link'=>$value2->ext_link,
                    'permalink'=>$value2->lang()->where('lang',app()->getLocale())->first()->permalink,
                    'title'=>$value2->lang()->where('lang',app()->getLocale())->first()->label
                  ];
                }
              }
              $res[] = [
                'ext_link'=>$value->ext_link,
                "permalink"=>$value->lang()->where('lang',app()->getLocale())->first()->permalink,
                "title"=>$value->lang()->where('lang',app()->getLocale())->first()->label,
                "child"=>$r
              ];
            }
            if($mp->count()){
              return ["parent"=>['label'=>$mp->first()->lang()->where('lang',app()->getLocale())->first()->label,'id'=>$mp->first()->id],'child'=>$res];
            }else{
              return ['parent'=>'-','child'=>$res];
            }
          }
          return [];
      }
      return [];
   }

   static function cekPermalink($p,$id=null){
      if($id)
        $mp = \App\Models\MenusLang::where('permalink',$p)->whereNotIn('menus_id',[$id])->get();
      else
        $mp = \App\Models\MenusLang::where('permalink',$p)->get();
      if($mp->count())
        return true;

      if(class_exists('\App\Models\NewsLang')){
        if($id)
          $mn = \App\Models\NewsLang::where('permalink',$p)->whereNotIn('news_id',[$id])->get();
        else
          $mn = \App\Models\NewsLang::where('permalink',$p)->get();
        if($mn->count())
          return true;
      }

      return false;
   }

   static function getMenuById($id){
      $m = \App\Models\Menus::whereId($id)->where('is_active',1)->first();
      if($m){
        return $m;
      }
   }

   static function cekChild($arr,$m){
      $i=0;
      foreach($arr as $d=>$dv){
        if(@$dv['parent'] == $m){
          $c = in_array($dv['route'][0],['setting','privillage']) ? $dv['route'][0] : 'index';
          if(self::getPriv(auth()->guard('admin')->user()->id,$d,$c)){
            $i++;
          }
        }
      }
      return $i;
   }

   static function cekChildExist($id){
    $m = \App\Models\Menus::where('is_parent',$id)->count();
    return $m;
   }
   
   static function getTemplateBisnis(){
       $m = \App\Models\Menus::where('template','bisnis')->where('is_active','1')->where('show_home','1')->orderBy('sequence_date','desc')->get();
       return $m;
   }

   static function getTemplateBisnisNew($id){
       $m = \App\Models\Menus::where('template','bisnis')->whereNotIn('id',[$id])->where('is_active','1')->inRandomOrder()->limit(4)->get();
       return $m;
   }

   static function getTemplateBisnisParent(){
      $m = \App\Models\Menus::where('template','bisnis')->where('is_active','1')->orderBy('sequence_date','desc')->get();
      $arr = [];
       foreach($m as $d){
          $arr[$d->id]['parent'] = $d;
          $m2 = \App\Models\Menus::where('template','bisnis')->where('is_active','1')->where('is_parent',$d->id)->whereNotIn('id',[$d->id])->orderBy('sequence_date','desc')->get();
          foreach($m2 as $dx){
            $arr[$d->id]['child'][$dx->id]=$dx;
            if(in_array($dx->id,array_keys($arr))){
              unset($arr[$dx->id]);
            }
          }
       }
       return $arr;
   }

   static function getParents($id){
      $d = \App\Models\Menus::whereId($id)->first();
      $p = $d->is_parent;
      $res[] = $d->translate()->label;
      while($p){
        $dx = \App\Models\Menus::whereId($p)->first();
        $res [] = $dx->translate()->label;
        $p = $dx->is_parent;
      }
      if(count($res) > 1){
        $r = array_reverse($res);
        return implode(" - ",$r);
      }else{
        return $res[0];
      }
   }
}