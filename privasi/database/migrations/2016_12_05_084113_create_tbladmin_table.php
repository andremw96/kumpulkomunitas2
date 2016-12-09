<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbladminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbladmin', function (Blueprint $table)
            {
                $table->increments('admin_id');
                $table->string('username')->unique();
                $table->string('password');
                $table->timestamps();
                $table->string('created_at_ip');
                $table->string('updated_at_ip');
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbladmin');
    }
}
