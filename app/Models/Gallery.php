<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table= "gallery";
    protected $fillable = ["gallery_title", "gallery_category","gallery_image","category_id"];
}
