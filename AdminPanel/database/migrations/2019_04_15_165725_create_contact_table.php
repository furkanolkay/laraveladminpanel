<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contact', function (Blueprint $table) {


            $table->increments('id');
            $table->string("c_location");
            $table->string("phone_number");
            $table->string("mail_adress");
            $table->string("web_sites");
            $table->string("c_instagram");
            $table->string("c_facebook");
            $table->string("c_twitter");
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
        Schema::dropIfExists('contact');
    }
}
