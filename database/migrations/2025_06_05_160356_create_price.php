<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('harga');
            $table->string('harga_coret')->nullable();
            $table->integer('is_advance')->nullable()->default(0);
            $table->integer('is_unggulan')->nullable()->default(0);
            $table->integer('is_active')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price');
    }
};
