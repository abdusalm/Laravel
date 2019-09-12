<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->comment('标题');
            $table->string('discription')->comment('描述');
            $table->string('t_id')->comment('上传者ID');
            $table->string('co_id')->comment('课程编码');
            $table->text('content')->comment('内容');
            $table->integer('hits')->comment('点击次数');
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
        Schema::dropIfExists('article_info');
    }
}
