<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navs', function (Blueprint $table) {
            $table->engine='MyISAM';
            $table->increments('nav_id');
            $table->string('nav_name')->comment('导航名');
            $table->string('nav_alias')->comment('导航别名');
            $table->string('nav_url')->comment('导航地址');
            $table->integer('nav_order')->default(0)->comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('navs');
    }
}
