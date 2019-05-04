<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public  function show_Contact(){
        //	$about=About::find(1);
        $contact=Contact::where('id', '>', 0)->first();

        if(isset($contact)){
            return view("backend.contact.contact",compact("contact"));
        }else{
            $contact=(object)array('c_location' =>"Boş olarak yaratıldı",'phone_number' =>"Boş olarak yaratıldı",'mail_adress' =>"Boş olarak yaratıldı",'web_sites' =>"Boş olarak yaratıldı",'c_facebook' =>"Boş olarak yaratıldı",'c_twitter' =>"Boş olarak yaratıldı",'c_instagram' =>"Boş olarak yaratıldı");
            return view("backend.contact.contact",compact("contact"));
        }



    }
    public function edit_Contact(Request $request){
        $count=Contact::count();

        if ($count<=0) {
            $contact=new Contact();
            $contact->c_location=$request->c_location;
            $contact->phone_number=$request->phone_number;
            $contact->mail_adress=$request->mail_adress;
            $contact->web_sites=$request->web_sites;
            $contact->c_facebook=$request->c_facebook;
            $contact->c_instagram=$request->c_instagram;
            $contact->c_twitter=$request->c_twitter;




            if ($contact->save()) {
                return ["status" => "success", "title" => "Başarılı", "message" => "İletişim Başarıyla oluşturuldu!"];
            }

            return ["status" => "error", "title" => "Hatalı", "message" => "İletişim oluşturulamadı!!!"];
        }
        else{




            //$about = About::find(1)


            $contact=Contact::where('id', '>', 0)->first()->update([


                "c_location"=>$request->c_location,
                "phone_number" => $request->phone_number,
                "mail_adress" => $request->mail_adress,
                "web_sites" => $request->web_sites,
                "c_facebook" => $request->c_facebook,
                "c_instagram" => $request->c_instagram,
                "c_twitter" => $request->c_twitter,

            ]);


            if($contact)
            {
                return ["status" => "success", "title" => "Başarılı", "message" => "Yeni ayar kaydedildi"];
            }

            return ["status" => "error", "title" => "Hatalı", "message" => "Yeni ayar kaydedilemedi"];

        }






    }




}
