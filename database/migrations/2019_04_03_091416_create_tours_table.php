<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->integer('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->string('name');
            $table->text('small_desc');
            $table->text('desc');
            $table->string('img');
            $table->string('cover')->nullable();
            $table->decimal('price_start_from')->default(0);
            $table->text('inclusion');
            $table->text('exclusion');
            $table->unsignedInteger('price_table_id')->nullable();
            $table->enum('show_in_special_offers', ['yes', 'no'])->default('no');
            $table->enum('num_of_stars', ['1', '2', '3', '4', '5', '6','7'])->default('5');
            $table->text('seo')->nullable();
            $table->string('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('tours');
    }
}
