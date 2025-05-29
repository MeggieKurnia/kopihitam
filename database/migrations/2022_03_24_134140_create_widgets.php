<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('base_id');
            $table->string('module');
            $table->string('name');
            $table->datetime('sequence');
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('widget_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('widget_id');
            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade');
            $table->string('lang')->nullable();
            $table->string('key')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widget_value');
        Schema::dropIfExists('widgets');
    }
}
