<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('about', function (Blueprint $table) {


            $table->increments('id');
            $table->text("content");
            $table->text("vision");
            $table->text("mission");
            $table->string("unit_1");
            $table->string("unit_2");
            $table->string("unit_3");
            $table->string("unit_4");
            $table->string("unit_5");
            $table->text("unit_1_content");
            $table->text("unit_2_content");
            $table->text("unit_3_content");
            $table->text("unit_4_content");
            $table->text("unit_5_content");
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
        Schema::dropIfExists('about');
    }
}
