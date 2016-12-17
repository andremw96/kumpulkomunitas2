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
             $table->string('user_id', 15);
             $table->string('komunitas', 100);
             $table->string('title', 100);
             $table->timestamp('start_time');
             $table->timestamp('end_time')->nullable();
             $table->timestamps();
             $table->string('updated_by');
             $table->softDeletes();
             $table->string('deleted_by');
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
