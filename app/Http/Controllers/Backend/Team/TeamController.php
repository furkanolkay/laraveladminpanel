<?php

namespace App\Http\Controllers\Backend\Team;

use App\Models\Team;
use App\Models\Team2;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{

    public function show_Team(){
        $team= Team::all();
        $team2=Team2::all();
        return view("backend.team.teamList",compact("team","team2"));
    }


    public function team_Delete(Request $request){

        $team = Team::where("id", $request->id)->first();
        $team2=Team2::where("table1_id",$team->uniq)->first();
        Storage::disk("public")->delete($team2->member_image);
        $team->delete();
        $team2->delete();
        if ($team && $team2){

            return ["status" => "success", "title" => "başarılı", "message" => "Blog silindi."];
        }

        return ["status" => "error", "title" => "Hatalı", "message" => "Blog silinemedi"];
    }





    public function team(){



        return view('backend.team.team');
    }





















    public function team_Add(Request $request){

        $uploadedFile=$request->file("coverImage");
        $uuid=Str::uuid()->toString();
        $filename=$uuid.time()."team";
        try {
            $image = new SimpleImage($request->file("coverImage"));
            $image
                ->autoOrient()
                ->resize(720, 480)
                ->toFile(public_path().'/team/'.$filename.'.png', 'image/png',90)      // convert to PNG and save a copy to new-image.png
                ->toScreen();                               // output to the screen

        } catch(Exception $err) {
            // Handle errors
            echo $err->getMessage();
        }

        $team=new Team();
        $team->team_year=$request->team_year;

        $team->member_name=$request->member_name;
        $team->member_duty=$request->member_duty;
        $team->member_department=$request->member_department;
        $team->uniq=$uuid;
        $team2=new Team2();


        $team2->member_linkedin=$request->member_linkedin;
        $team2->member_instagram=$request->member_instagram;
        $team2->member_twitter=$request->member_twitter;
       // $team->member_image='team/';
        $team2->table1_id=$uuid;
        $team2->member_image='team/'.$filename.'.png';
        if($team2->save() && $team->save()){

            return ["status" => "success", "title" => "Başarılı", "message" => " Başarıyla oluşturuldu!"];
        }
        return ["status" => "error", "title" => "Wrongg", "message" => "... wronggg !"];

    }
}
