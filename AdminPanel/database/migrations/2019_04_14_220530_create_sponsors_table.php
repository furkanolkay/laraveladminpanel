<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(3000);
        Schema::create('sponsors', function (Blueprint $table) {


            $table->increments('id');
            $table->string("sponsor_name");
            $table->string("image_path");
            $table->string("sponsor_year");
            $table->string("sponsor_link");
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
        Schema::dropIfExists('sponsors');
    }
}
