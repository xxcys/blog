<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->engine='MyISAM';
            $table->bigIncrements('link_id');
            $table->string('link_name')->default('')->comment('//友情链接标题');
            $table->string('link_title')->default('')->comment('//友情链接描述');;
            $table->string('link_url')->default('')->comment('//友情链接');;
            $table->integer('link_order')->default(0)->comment('//友情链接排序');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
