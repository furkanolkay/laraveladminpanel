<?php

namespace App\Http\Controllers\Frontend\Sponsors;

use App\Models\Sponsors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorsController extends Controller
{
    public  function show_Sponsor($year){



        $sponsors=Sponsors::where("sponsor_year",$year)->get();
        return view("frontend.sponsor.sponsor",compact("year","sponsors"));

    }
}
