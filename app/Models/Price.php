<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model{

	protected $table = 'price';

	protected $fillable = ['title','is_active','is_unggulan','is_advance','harga_coret','harga'];
}