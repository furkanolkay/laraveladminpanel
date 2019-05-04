<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{

    public function gallery(){

        $category=GalleryCategory::all();

        return view('backend.gallery.gallery',compact("category"));
    }

    public function gallery_Add(Request $request){
        $category=GalleryCategory::find($request->gallery_category);
      // $images=array();
        if($files=$request->file('images')){
            $i=0;
            foreach($files as $file){
                $uuid=Str::uuid()->toString();
                $filename=$i.$uuid.time()."gallery";
              //  $images[]=$filename;
                try {
                    $image = new SimpleImage($file);
                    $image
                        ->resize(640, 400)
                        ->toFile(public_path().'/gallery/'.$filename.'.png', 'image/png',70);
                } catch(Exception $err) {
                    // Handle errors
                    echo $err->getMessage();
                    return ["status" => "error", "title" => "Wrongg", "message" => "... wronggg !"];

                }

                $gallery=new Gallery();


                $gallery->gallery_category=$category->category_title;
                $gallery->gallery_title=$category->category_keywords;
                $gallery->category_id=$request->gallery_category;

                $gallery->gallery_image="gallery/".$filename.".png";

                $gallery->save();

$i++;
            }
        }
        if($gallery->save()){

            return ["status" => "success", "title" => "Başarılı", "message" => " Başarıyla oluşturuldu!"];
        }

    }









    public function show_gallery(){

        $gallery=Gallery::all();

        return view('backend.gallery.galleryList',compact("gallery"));
    }


    public function gallery_Delete(Request $request){

        $gallery = Gallery::where("id", $request->id)->first();
        Storage::disk("public")->delete($gallery->gallery_image);
        $gallery->delete();

        if ($gallery){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog silinemedi"];
    }
















}
