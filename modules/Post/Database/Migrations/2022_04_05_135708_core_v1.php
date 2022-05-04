<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->tinyText('description')->nullable();
            $table->commonFields();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->foreignUuid('category_id')->nullable();
            $table->commonFields();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
    }
};
