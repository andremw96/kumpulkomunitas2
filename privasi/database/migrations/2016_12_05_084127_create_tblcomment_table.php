<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblcommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcomment', function (Blueprint $table)
            {
                $table->increments('comment_id');
                $table->text('comment');
                $table->integer('post_id'); //foreign key ke tabel post
                $table->timestamps();
                $table->integer('updated_by');
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
        Schema::drop('tblcomment');
    }
}
