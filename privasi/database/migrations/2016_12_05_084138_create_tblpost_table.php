<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpost', function (Blueprint $table)
            {
                $table->increments('post_id');
                $table->string('title');
                $table->text('content'); 
                $table->timestamps();
                $table->integer('updated_by');
                $table->integer('category_id'); //foreign key
                $table->integer('user_id'); //foreign key
                $table->string('username');
                $table->string('created_at_ip'); 
                $table->string('updated_at_ip');
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
        Schema::drop('tblpost');
    }
}
