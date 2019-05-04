<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeam2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team2', function (Blueprint $table) {
            $table->increments('id');
            $table->string("table1_id")->nullable();
            $table->string("member_linkedin");
            $table->string("member_instagram");
            $table->string("member_twitter");
            $table->string("member_image");
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
        Schema::dropIfExists('team2');
    }
}
