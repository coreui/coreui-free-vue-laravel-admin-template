<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
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
            $table->integer('roles_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('href')->nullable();
            $table->string('icon')->nullable();
            $table->string('slug');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('menu_id')->unsigned();
            $table->integer('sequence')->nullable()->default(99999);
            $table->timestamps();
            
            $table->foreign('roles_id')->references('id')->on('roles');
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
    }
}
