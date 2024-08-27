<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id'); // id bigint unsigned NOT NULL AUTO_INCREMENT
            $table->unsignedInteger('product_id')->comment('商品 ID'); // product_id int unsigned NOT NULL
            $table->string('title', 255)->default('')->comment('标题'); // title varchar(255) DEFAULT ''
            $table->string('desc', 255)->default('')->comment('描述'); // desc varchar(255) DEFAULT ''
            $table->json('images')->nullable()->comment('图片'); // images json DEFAULT NULL
            $table->timestamps(); // created_at 和 updated_at

            // 添加外键约束
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
};