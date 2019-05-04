<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table= "notice";
    protected $fillable = ["notice_image", "notice_title", "notice_content"];
}
