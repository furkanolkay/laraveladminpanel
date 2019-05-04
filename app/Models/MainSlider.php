<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    protected $table= "main_slider";
    protected $fillable = ["slider_image", "slider_title", "slider_content",
        "slider_state"];
}
