<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembuatanPT extends Model{

	protected $table = 'pembuatan_pt';

	protected $fillable = ['title','subtitle','intro','is_active'];
}