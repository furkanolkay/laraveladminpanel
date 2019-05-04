<?php

namespace App\Http\Controllers\Backend\Notice;

use App\Models\Notice;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function notice(){

        return view("backend.notice.notice");
    }


    public function notice_update_show($id){

        $notice=Notice::find($id);

        return view("backend.notice.notice",compact("notice"));
    }
    public function notice_update($id, Request $request)
    {


        $notice_old = Notice::find($id);
        $file = $notice_old->notice_image;


        if ($request->file("coverImage") != null){
            Storage::disk("public")->delete($notice_old->notice_image);
            $uuid=Str::uuid()->toString();
            $filename=$uuid.time()."notice";
            try {
                $image = new SimpleImage($request->file("coverImage"));
                $image
                    ->autoOrient()
                    ->resize(640, 400)

                    ->toFile(public_path().'/notice/'.$filename.'.png', 'image/png',90)      // convert to PNG and save a copy to new-image.png
                    ->toScreen();                               // output to the screen

            } catch(Exception $err) {
                // Handle errors
                echo $err->getMessage();
            }


            $image_path='notice/'.$filename.'.png';

        }else{

            $image_path=$file;

        }






        $notice = Notice::find($id)->update([
            "notice_title" => $request->notice_title,
            "notice_content" => $request->notice_content,
            "notice_image" => $image_path,

        ]);

        if ($notice){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog güncellendi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog güncellenemedi"];
    }





    public function show_notice(){
        $notice= Notice::all();
        return view("backend.notice.noticeList",compact("notice"));
    }
    public function notice_Add(Request $request){

        $uploadedFile=$request->file("coverImage");
        $uuid=Str::uuid()->toString();
        $filename=$uuid.time()."notice";
        try {
            $image = new SimpleImage($request->file("coverImage"));
            $image
                ->autoOrient()
                ->resize(640, 400)

                ->toFile(public_path().'/notice/'.$filename.'.png', 'image/png',90)      // convert to PNG and save a copy to new-image.png
                ->toScreen();                               // output to the screen

        } catch(Exception $err) {
            // Handle errors
            echo $err->getMessage();
        }

        $notice=new Notice();
        $notice->notice_title=$request->notice_title;

        $notice->notice_content=$request->notice_content;



        $notice->notice_image='notice/'.$filename.'.png';
        if($notice->save()){

            return ["status" => "success", "title" => "Başarılı", "message" => " Başarıyla oluşturuldu!"];
        }
        return ["status" => "error", "title" => "Wrongg", "message" => "... wronggg !"];

    }


    public function notice_Delete(Request $request){

        $notice = Notice::where("id", $request->id)->first();
        Storage::disk("public")->delete($notice->notice_image);
        $notice->delete();

        if ($notice){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog silinemedi"];
    }






}
