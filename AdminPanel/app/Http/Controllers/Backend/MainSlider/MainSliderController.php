<?php

namespace App\Http\Controllers\Backend\MainSlider;

use App\Models\MainSlider;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MainSliderController extends Controller
{



    public function show_sliders(){

$sliders=MainSlider::all();

        return view('backend.mainslider.sliderList',compact("sliders"));
    }

    public function mainslider(){



        return view('backend.mainslider.mainslider');
    }





    public function slider_Delete(Request $request){

        $slider = MainSlider::where("id", $request->id)->first();
        Storage::disk("public")->delete($slider->slider_image);
        $slider->delete();

        if ($slider){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog silinemedi"];
    }


            public  function slider_update(Request $request){



            $id=$request->value;
            $slider=MainSlider::find($id);

            if(($slider->slider_state)=="true"){
                MainSlider::where("id",$id)->update([


                    "slider_state"=>"false"


                ]);





            }else{
                MainSlider::where("id",$id)->update([
                    "slider_state"=>"true"
                ]);
            }







    }




    public function slider_Add(Request $request){
        $uuid=Str::uuid()->toString();
        $uploadedFile=$request->file("coverImage");
        $filename=$uuid.time()."sliders";
        try {
            $image = new SimpleImage($request->file("coverImage"));
            $image
                ->autoOrient()
                ->toFile(public_path().'/sliders/'.$filename.'.png', 'image/png',90)      // convert to PNG and save a copy to new-image.png
                ->toScreen();                               // output to the screen

        } catch(Exception $err) {
            // Handle errors
            echo $err->getMessage();
        }

        $slider=new MainSlider();
        $slider->slider_title=$request->slider_title;

        $slider->slider_content=$request->slider_content;


        // $team->member_image='team/';
        $slider->slider_image='sliders/'.$filename.'.png';
        if($slider->save()){

            return ["status" => "success", "title" => "Başarılı", "message" => " Başarıyla oluşturuldu!"];
        }
        return ["status" => "error", "title" => "Wrongg", "message" => "... wronggg !"];

    }









    public function show_mainslider()
    {



        return view("backend.mainslider.mainslider");
    }
}