<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table= "team";
    protected $fillable = ["team_year", "member_name", "member_duty",
        "member_department","uniq"];
}
