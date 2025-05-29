<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Widget;

class Widgetvalue extends Model
{
    protected $table = "widget_value";

    function widget(){
    	return $this->belongsTo(Widget::class);
    }
}
