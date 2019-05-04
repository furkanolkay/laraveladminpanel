<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryCategoryController extends Controller
{



    public function show_category(){

        $category=GalleryCategory::all();

        return view('backend.gallery.galleryCategoryList',compact("category"));
    }










    public function category(){



        return view('backend.gallery.galleryCategory');
    }

    public function category_Add(Request $request){




        $category=new GalleryCategory();
        $category->category_title=$request->category_title;
        $category->category_year=$request->category_year;

        $category->category_keywords=$request->category_keywords;


        $category->category_place=$request->category_place;


        if($category->save()){

            return ["status" => "success", "title" => "Başarılı", "message" => " Başarıyla oluşturuldu!"];
        }
        return ["status" => "error", "title" => "Wrongg", "message" => "... wronggg !"];

    }








    public function category_Delete(Request $request){

        $category = GalleryCategory::find($request->id);

        $category->delete();

        if ($category){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog silinemedi"];
    }




}
