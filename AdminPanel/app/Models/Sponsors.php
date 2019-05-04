<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsors extends Model
{
    
 protected $table= "sponsors";
 protected $fillable = ["sponsor_name","image_path","sponsor_year","sponsor_link"];


}
