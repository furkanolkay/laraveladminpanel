<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table= "contact";
    protected $fillable = ["c_location","phone_number","mail_adress","web_sites","c_instagram","c_facebook","c_twitter"];
}
