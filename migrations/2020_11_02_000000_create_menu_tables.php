<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTables extends Migration
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
            $table->string('uri', 56)->index()->comment('标识');
            $table->string('block', 56)->nullable()->comment('块标识');
            $table->unsignedBigInteger('sort')->default(0)->comment('排序');
            $table->string('title', 50)->nullable()->comment('名称');
            $table->string('icon')->nullable()->comment('图标');
            $table->string('url')->nullable()->comment('链接');
            $table->boolean('show_title')->default(1)->comment('是否显示文字');
            $table->boolean('show_icon')->default(1)->comment('是否显示图标');
            $table->boolean('show_h5')->default(1)->comment('H5端是否显示');
            $table->boolean('show_mini_app')->default(1)->comment('小程序是否显示');
            $table->boolean('show_app')->default(1)->comment('APP是否显示');
            $table->string('permission')->nullable()->comment('权限');
            $table->timestamps();
        });

        Schema::create('role_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->index()->comment('关联规则');
            $table->unsignedBigInteger('menu_id')->index()->comment('关联菜单');
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
        Schema::dropIfExists('menus');
        Schema::dropIfExists('role_menus');
    }
}
