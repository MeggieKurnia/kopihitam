<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivillage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privillage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('user_cms')->onDelete('cascade');
            $table->string('module')->nullabel();
            $table->string('action')->nullabel();
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
        Schema::dropForeign('lists_user_id_foreign');
        Schema::dropIndex('lists_user_id_index');
        Schema::dropColumn('user_id');
        Schema::dropIfExists('privillage');

    }
}
