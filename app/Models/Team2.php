<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team2 extends Model
{
    protected $table= "team2";
    protected $fillable = ["table1_id","member_linkedin","member_instagram","member_twitter","member_image"];
}
