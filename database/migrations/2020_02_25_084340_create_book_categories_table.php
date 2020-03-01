<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
          $table->Increments('id');
          $table->integer('book_id')->unsigned()->nullable();
          $table->integer('category_id')->unsigned()->nullable();
          $table->timestamps();

          $table->foreign('book_id')->references('id')->on('books')->onDelete("cascade")->onUpdate("cascade");
          $table->foreign('category_id')->references('id')->on('categories')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
}
