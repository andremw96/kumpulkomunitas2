<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('category');
                $table->string('description');
                $table->integer('parent_id');
                $table->timestamps();
                $table->integer('user_id');
                $table->softDeletes();
                $table->integer('updated_by');
            });

        /*$faker = Faker\Factory::create();

        $limit = 40;

        for ($i = 0; $i < $limit; $i++){
            DB::table('category')->insert([
                'cat_id' => $faker->name,
            ]);
        }*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category');
    }
}
