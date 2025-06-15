<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model{

	protected $table = 'feature';

	protected $fillable = ['title','feature','image','description','is_active'];
}