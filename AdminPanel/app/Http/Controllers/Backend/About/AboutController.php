<?php

namespace App\Http\Controllers\Backend\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;



class AboutController extends Controller
{
public  function show_About(){
	//	$about=About::find(1);
        $about=About::where('id', '>', 0)->first();

		if(isset($about)){
			 return view("backend.about.about",compact("about"));
		}else{
			$about=(object)array('content' =>"Boş olarak yaratıldı",'vision' =>"Boş olarak yaratıldı",'mission' =>"Boş olarak yaratıldı",'unit_1' =>"Boş olarak yaratıldı",'unit_2' =>"Boş olarak yaratıldı",'unit_3' =>"Boş olarak yaratıldı",'unit_4' =>"Boş olarak yaratıldı",'unit_5' =>"Boş olarak yaratıldı",'unit_1_content' =>"Boş olarak yaratıldı",'unit_2_content' =>"Boş olarak yaratıldı",'unit_3_content' =>"Boş olarak yaratıldı",'unit_4_content' =>"Boş olarak yaratıldı",'unit_5_content' =>"Boş olarak yaratıldı");
			return view("backend.about.about",compact("about"));
		}

		 

}    

public function edit_About(Request $request){
$count=About::count();

 if ($count<=0) {
$about=new About();
$about->content=$request->content;
$about->vision=$request->vision;
$about->mission=$request->mission;
$about->unit_1=$request->unit_1;
$about->unit_2=$request->unit_2;
$about->unit_3=$request->unit_3;
$about->unit_4=$request->unit_4;
$about->unit_5=$request->unit_5;

$about->unit_5_content=$request->unit_5_content;
$about->unit_4_content=$request->unit_4_content;
$about->unit_3_content=$request->unit_3_content;
$about->unit_2_content=$request->unit_2_content;
$about->unit_1_content=$request->unit_1_content;


if ($about->save()) {
   return ["status" => "success", "title" => "Başarılı", "message" => "Hakkımızda Başarıyla oluşturuldu!"];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Hakkımızda oluşturulamadı!!!"];
 }
else{
  



 //$about = About::find(1)


         $about=About::where('id', '>', 0)->first()->update([


            "content"=>$request->content,
            "vision" => $request->vision,
            "mission" => $request->mission,
            "unit_1" => $request->unit_1,
            "unit_2" => $request->unit_2,
		    "unit_3" => $request->unit_3,
		    "unit_4" => $request->unit_4,
		    "unit_5" => $request->unit_5,
		    "unit_1_content" => $request->unit_1_content,
		    "unit_2_content" => $request->unit_2_content,
		    "unit_3_content" => $request->unit_3_content,
		    "unit_4_content" => $request->unit_4_content,
		    "unit_5_content" => $request->unit_5_content,

			 


        ]);


		 if($about)
		{
		            return ["status" => "success", "title" => "Başarılı", "message" => "Yeni ayar kaydedildi"];
		        }

		        return ["status" => "error", "title" => "Hatalı", "message" => "Yeni ayar kaydedilemedi"];

}




 

}





}
