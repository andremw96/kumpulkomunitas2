<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestCom', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('namaKomunitas');
            $table->text('deskipsi'); 
            $table->timestamps();
            $table->integer('disetujui');
            $table->integer('post_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requestCom');
    }
}
