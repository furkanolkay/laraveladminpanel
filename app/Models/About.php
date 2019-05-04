<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
      protected $table= "about";
    protected $fillable = ["content", "vision", "mission",
    "unit_1","unit_2","unit_3","unit_4","unit_5","unit_1_content","unit_2_content","unit_3_content"
,"unit_4_content","unit_5_content"];
}
