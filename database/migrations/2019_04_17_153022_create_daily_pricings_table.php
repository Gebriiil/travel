<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->string('title');
            $table->decimal('one_person',10,2)->default(0);
            $table->decimal('two_persons',10,2)->default(0);
            $table->decimal('three_persons',10,2)->default(0);
            $table->decimal('four_persons',10,2)->default(0);
            $table->decimal('five_persons',10,2)->default(0);
            $table->decimal('six_persons',10,2)->default(0);
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
        Schema::dropIfExists('daily_pricings');
    }
}
