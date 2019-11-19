<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foreign_key')->default(0)->comment('外键');
            $table->string('type')->nullable()->comment('分享类型：自定义的');
            $table->string('title')->comment('分享标题');
            $table->string('desc')->comment('分享描述');
            $table->string('link')->nullable()->comment('分享链接');
            $table->string('img')->comment('分享图片');
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
        Schema::dropIfExists('shares');
    }
}
