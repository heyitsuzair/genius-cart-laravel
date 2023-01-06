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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->text('pictures');
            $table->integer('price');
            $table->integer('quantity');
            $table->foreignId('category_id')->constrained()->on('categories')->onDelete('cascade');
            $table->integer('total_reviews')->default(0);
            $table->float('average_rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};