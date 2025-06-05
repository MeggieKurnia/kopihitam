<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricecv extends Model{

	protected $table = 'price_cv';

	protected $fillable = ['title','is_active','is_unggulan','is_advance','harga_coret','harga','link_buy'];
}