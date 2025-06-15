<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Widgetvalue;

class Widget extends Model
{
    protected $table = "widgets";

    function detail(){
    	return $this->hasMany(Widgetvalue::class);
    }
}
