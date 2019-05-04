<?php

namespace App\Http\Controllers\Frontend\Gallery;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public  function show_Gallery(){
    $add=array();
        //$images_info=array();
        $images_uniq=Gallery::distinct()->get("category_id");

        $deneme=array();
        foreach ($images_uniq as $uniq){

            $images_info=Gallery::where("category_id",$uniq->category_id)->get();
            $deneme[]=$images_info;
      }






        return view("frontend.gallery.gallery",compact("deneme"));




    }
}
