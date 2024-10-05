<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.index')
        // Showing the posts with both language
        ->with('posts',Post::orderBy('created_at','desc')->paginate(5));
        // Filtering the posts according the website's posts
        // ->with('posts',Post::orderBy('created_at','desc')->where('lang',app()->getLocale())->paginate(5));


    }

    public function show($slug){

        // return $slug;
        // return view('frontend.home.index')
        $post_details = Post::where('slug',$slug)->first();
        return view('frontend.home.show')
        ->with('post',$post_details  );
        
    }
}
