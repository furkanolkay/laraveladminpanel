<?php

Route::get('admin/giris-yap', 'Auth\LoginController@showLoginForm')->name('backend.login');
Route::post('admin/giris-yap', 'Auth\LoginController@login');
Route::get('admin/cikis-yap', 'Auth\LoginController@logout')->name('backend.logout');





Route::group(["prefix"=>"admin","as"=>"backend","namespace"=>"Backend", "middleware"=>"auth"],function(){

    Route::get('/', function () {
        return view('backend.home.home');
    });

Route::group(["prefix"=>"about","as"=>".about","namespace"=>"About"],function (){

    Route::get("/","AboutController@show_About")->name(".show");
    Route::post("/update", "AboutController@edit_About")->name(".update");
  
  });


Route::group(["prefix"=>"sponsors","as"=>".sponsors","namespace"=>"Sponsors"],function (){

    Route::get("/","SponsorsController@show_Sponsors")->name(".show");
    Route::post("/sponsor", "SponsorsController@sponsor_Add")->name(".sponsor");
 	Route::get("/sponsor", "SponsorsController@sponsor")->name(".sponsor");
    Route::post("/delete", "SponsorsController@sponsor_Delete")->name(".delete");

  });

    Route::group(["prefix"=>"contact","as"=>".contact","namespace"=>"Contact"],function (){

        Route::get("/","ContactController@show_Contact")->name(".show");
        Route::post("/update", "ContactController@edit_Contact")->name(".update");

    });




    Route::group(["prefix"=>"team","as"=>".team","namespace"=>"Team"],function (){

        Route::get("/","TeamController@show_Team")->name(".show");
        Route::post("/team", "TeamController@team_Add")->name(".team");
        Route::get("/team", "TeamController@team")->name(".team");
        Route::post("/delete", "TeamController@team_Delete")->name(".delete");


    });


    Route::group(["prefix"=>"mainslider","as"=>".mainslider","namespace"=>"mainslider"],function (){

        Route::get("/","MainSliderController@show_sliders")->name(".show");
        Route::post("/slider", "MainSliderController@slider_Add")->name(".mainslider");
        Route::get("/slider", "MainSliderController@mainslider")->name(".mainslider");
        Route::post("/delete", "MainSliderController@slider_Delete")->name(".delete");
        Route::post("/update", "MainSliderController@slider_update")->name(".update");


    });

    Route::group(["prefix"=>"notice","as"=>".notice","namespace"=>"notice"],function (){

        Route::get("/","NoticeController@show_notice")->name(".show");
        Route::post("/notice", "NoticeController@notice_Add")->name(".notice");
        Route::get("/notice", "NoticeController@notice")->name(".notice");
        Route::post("/delete", "NoticeController@notice_Delete")->name(".delete");
        Route::post("/update/{id}", "NoticeController@notice_update")->name(".update");
        Route::get("/update/{id}", "NoticeController@notice_update_show")->name(".updateShow");

    });


    Route::group(["prefix"=>"gallery","as"=>".gallery","namespace"=>"gallery"],function (){

        Route::get("/category","GalleryCategoryController@show_category")->name(".categoryshow");

        Route::post("/categoryAdd", "GalleryCategoryController@category_Add")->name(".categoryAdd");
        Route::get("/categoryAdd", "GalleryCategoryController@category")->name(".categoryAdd");
        Route::post("/categorydelete", "GalleryCategoryController@category_Delete")->name(".categorydelete");


        Route::get("/galleryAdd", "GalleryController@gallery")->name(".galleryAdd");
        Route::post("/galleryAdd", "GalleryController@gallery_Add")->name(".galleryAdd");

        Route::get("/","GalleryController@show_gallery")->name(".show");
        Route::post("/gallerydelete", "GalleryController@gallery_Delete")->name(".gallerydelete");






    });




});