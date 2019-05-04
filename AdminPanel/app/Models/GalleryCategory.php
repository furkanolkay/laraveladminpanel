<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table= "gallery_category";
    protected $fillable = ["category_title","category_place","category_year","category_keywords"];
}
