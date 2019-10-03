<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_place');
            $table->string('to_place');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->enum('car_type', ['private', 'shuttle', 'special']);
            $table->integer('adult_number');
            $table->integer('children_number');
            $table->enum('have_infants', ['yes', 'no']);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('transfers');
    }
}
