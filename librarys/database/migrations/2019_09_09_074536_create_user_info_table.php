<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->comment('用户名');
            $table->string('password')->comment('密码');
            $table->string('user_id')->nullable()->comment('用户账号');
            $table->string('role')->nullable()->comment('角色');
            $table->string('motto')->comment('座右铭');
            $table->string('resume')->comment('简历');
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
        Schema::dropIfExists('user_info');
    }
}
