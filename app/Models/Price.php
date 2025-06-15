<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model{

	protected $table = 'price';

	protected $fillable = ['menus_id','title','is_active','is_unggulan','is_advance','harga_coret','harga','link_buy'];

	public function menu(){
		return $this->belongsTo(\App\Models\Menus::class,'menus_id','id');
	}
}