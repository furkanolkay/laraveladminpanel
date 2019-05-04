<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Models\About;
use App\Models\MainSlider;
use App\Models\Team;
use App\Models\Team2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public  function show_Home(){

    $team=Team::all();
    $team2=Team2::all();
    $about=About::find(1);
    $sliders=MainSlider::all();


    if(!isset($about)){


        $about=(object)array('content' =>"Boş olarak yaratıldı",'vision' =>"Boş olarak yaratıldı",'mission' =>"Boş olarak yaratıldı",'unit_1' =>"Boş olarak yaratıldı",'unit_2' =>"Boş olarak yaratıldı",'unit_3' =>"Boş olarak yaratıldı",'unit_4' =>"Boş olarak yaratıldı",'unit_5' =>"Boş olarak yaratıldı",'unit_1_content' =>"Boş olarak yaratıldı",'unit_2_content' =>"Boş olarak yaratıldı",'unit_3_content' =>"Boş olarak yaratıldı",'unit_4_content' =>"Boş olarak yaratıldı",'unit_5_content' =>"Boş olarak yaratıldı");

    }


        return view("frontend.home.index",compact("about","team","team2","sliders"));


    }

}
