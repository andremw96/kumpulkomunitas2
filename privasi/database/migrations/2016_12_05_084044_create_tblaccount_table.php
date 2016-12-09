<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblaccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblaccount', function (Blueprint $table)
            {
                $table->increments('accnt_id');
                $table->string('username')->unique();
                $table->string('password');
                $table->integer('user_Id'); //foreign key dari tabel user
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
        Schema::drop('tblaccount');
    }
}
