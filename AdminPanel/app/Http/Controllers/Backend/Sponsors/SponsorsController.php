<?php

namespace App\Http\Controllers\Backend\Sponsors;

use claviska\SimpleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsors;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;


class SponsorsController extends Controller
{
    

		public function show_Sponsors(){
            $sponsors= Sponsors::all();
            return view("backend.sponsors.sponsorList",compact("sponsors"));



					 	
		}
		public function sponsor_Delete(Request $request){

            $sponsor = Sponsors::where("id", $request->id)->first();
            Storage::disk("public")->delete($sponsor->image_path);
            $sponsor->delete();

            if ($sponsor){

                return ["status" => "success", "title" => "başarılı", "message" => "Blog silindi."];
            }

            return ["status" => "error", "title" => "Hatalı", "message" => "Blog silinemedi"];
        }



		public function sponsor(){



		return view('backend.sponsors.sponsor');
		}



		public function sponsor_Add(Request $request){

            $uploadedFile=$request->file("coverImage");
            $uuid=Str::uuid()->toString();
            $filename=$uuid.time()."sponsor";
            try {
                $image = new SimpleImage($request->file("coverImage"));
                $image
                    ->autoOrient()
                    ->resize(640, 400)
                    ->toFile(public_path().'/sponsors/'.$filename.'.png', 'image/png',90)      // convert to PNG and save a copy to new-image.png
                    ->toScreen();                               // output to the screen

            } catch(Exception $err) {
                // Handle errors
                echo $err->getMessage();
            }
            $sponsor=new Sponsors();
            $sponsor->sponsor_name=$request->sponsor_name;
            $sponsor->sponsor_link=$request->sponsor_link1;
            $sponsor->sponsor_year=$request->sponsor_year;
            $sponsor->image_path='sponsors/'.$filename.'.png';
            if($sponsor->save()){

			    return ["status" => "success", "title" => "Başarılı", "message" => " Başarıyla oluşturuldu!"];
            }
            return ["status" => "error", "title" => "Wrongg", "message" => "... wronggg !"];

        }





}
