<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model{

	protected $table = 'client';

	protected $fillable = ['image','is_active'];
}