<?php


Route::group(["as"=>"frontend","namespace"=>"Frontend"],function (){



    Route::group(["as"=>".home","namespace"=>"Home"],function (){

        Route::get("/","HomeController@show_Home")->name(".show");


    });


    Route::group(["as"=>".gallery","namespace"=>"Gallery"],function (){

        Route::get("/album","GalleryController@show_Gallery")->name(".show");
    });


    Route::group(["as"=>".notice","namespace"=>"Notice"],function (){

        Route::get("/duyurular","NoticeController@show_Notice")->name(".show");
    });


    Route::group(["as"=>".sponsors","namespace"=>"Sponsors"],function (){

        Route::get("/sponsorlar/{year?}","SponsorsController@show_Sponsor")->name(".show");
    });




});
















