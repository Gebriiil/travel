<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateP2psTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p2ps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('agent_name');
            $table->string('responsible_name');
            $table->string('country');
            $table->string('email');
            $table->string('phone');
            $table->string('msg_title');
            $table->text('msg_body');
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
        Schema::dropIfExists('p2ps');
    }
}
