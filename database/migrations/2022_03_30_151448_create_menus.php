<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('template')->nullable();
            $table->datetime('sequence_date');
            $table->integer('is_active')->default(1);
            $table->string('banner')->nullable();
            $table->string('is_parent')->nullable();
            $table->integer('show_home')->nullable();
            $table->string('position')->nullable();
			 $table->string('youtube_embed')->nullable();
            $table->timestamps();
        });
        Schema::create('menus_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menus_id');
            $table->foreign('menus_id')->references('id')->on('menus')->onDelete('cascade');
            $table->string('lang');
            $table->string('label');
            $table->string('title')->nullable();
            $table->string('permalink')->nullable();
            $table->string('meta_title')->nullable();
			$table->string('title_content')->nullable();
            $table->text('section1')->nullable();
            $table->text('section2')->nullable();
            $table->text('meta_description')->nullable();
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
        Schema::dropIfExists('menus_lang');
        Schema::dropIfExists('menus');
    }
}
