<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\View\View;


class AboutController extends Controller
{
    public function index():view{
        // $about= DB::table('about')->get();
        // // echo $about;

        // foreach ($about as $us) {
        //     echo $us->sub_title;
        // }
        // return view('backend.about.index', ['about_content' => $about]);
        return view('backend.about.index')
        ->with('about_content',About::first());
    }

    public function store(Request $validated_data){
        $validated_data->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'description'=>'required',
        ]);

        DB::table('about')->where('id',1)->update(['title'=>$validated_data->title,'sub_title'=>$validated_data->sub_title, 'description'=>$validated_data->description]);
        Session::flash('success','About updated successfully');
        return redirect()->back();
    }
}
