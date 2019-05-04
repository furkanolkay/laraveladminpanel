<?php

namespace App\Http\Controllers\Frontend\Notice;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public  function show_Notice(){

            $notices=Notice::all();

        return view("frontend.notice.notice",compact("notices"));


    }
}
