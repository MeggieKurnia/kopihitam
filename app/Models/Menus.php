<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //
    protected $table = 'menus';
    protected $fillable = ['sequence_date','template','is_active','is_parent','position','banner','banner_mobile','show_home','youtube_embed','ext_link','meta_img','image_home','show_bval','image_thumb','label','meta_title','meta_description','meta_keyword','meta_img','permalink','banner_title','banner_intro','about_title','about_image','title_static','content_static','badge_text','badge_new_line'];

    function price(){
        return $this->hasMany(\App\Models\Price::class,'menus_id','id');
    }
}
