<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id');
             $table->string('komunitas', 100);
             $table->string('title', 100);
             $table->timestamp('start_time');
             $table->timestamp('end_time')->nullable();
             $table->timestamps();
             $table->integer('updated_by');
             $table->softDeletes();
             $table->integer('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
