<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table){

            $table->id();
            $table -> foreignId('user_id');
            $table -> foreignId('category_id');
            $table->string('slug') /*-> unique()*/;
            $table ->string('title');
            $table ->text('excerpt');
            $table ->text('body');
            $table->string('img_src');
            $table -> timestamps();
            $table -> timestamp('published at')-> nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
