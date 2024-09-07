<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;



class AboutController extends Controller
{
    public function index():view{
        // $about= DB::table('about')->get();
        // echo $about;

        // foreach ($about as $us) {
        //     echo $us->sub_title;
        // }
        return view('frontend.about.index')
        ->with('about_content',About ::first());
        // return view('frontend.about.index', ['about_content' => $about]);
    }
}
