<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->string('title');
            $table->decimal('summer_single_price', 10, 2)->default(0);
            $table->decimal('summer_double_price', 10, 2)->default(0);
            $table->decimal('summer_triple_price', 10, 2)->default(0);
            $table->decimal('winter_single_price', 10, 2)->default(0);
            $table->decimal('winter_double_price', 10, 2)->default(0);
            $table->decimal('winter_triple_price', 10, 2)->default(0);
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
        Schema::dropIfExists('package_pricings');
    }
}
