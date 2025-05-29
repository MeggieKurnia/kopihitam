<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    protected $table = 'menus';
    protected $fillable = ['sequence_date','template','is_active','is_parent','position','banner','banner_mobile','show_home','youtube_embed','ext_link','meta_img','image_home','show_bval','image_thumb'];

    function lang(){
    	return $this->hasMany(\App\Models\MenusLang::class,'menus_id','id');
    }
}

class MenusLang extends Model{
	protected $table = 'menus_lang';
	protected $fillable = ['label','meta_title','meta_description','lang','permalink','title','title_content','section1','section2','section3'];
	function dataRef(){
		return $this->belongsTo('App\Models\Menus','menus_id','id');
	}
}
