<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Container\Attributes\DB;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.post.index')
        ->with('posts',Post::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'sub_title' =>'required',
            'description' => 'required'
        ]);
        // Generate a slug from the title
        // $validatedData['slug'] = Str::slug($request->sub_title);
        
       
        
        Post::create(['title'=>$request->title, 'sub_title'=>$request->sub_title, 'description'=>$request->description, 'slug'=>Str::slug($request->title)]);
        // Show this message in notification bar when a post is created
        // Session::flash('success','Post Create Successfully');
        return redirect()->route('post.index')->with('success','Post Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('backend.post.edit')
        ->with('post', $post);    

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'title' => 'required',
            'sub_title' =>'required',
            'description' => 'required'
        ]);
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title);

        $post->save();
        // Show this message in notification bar when a post is updated
        // Session::flash('success','Post Updated Successfully');
    
        return redirect()->route('post.index')->with('success','Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success','Post Deleted Successfully');
        return "success";
    }
    public function trash(){
        return view('backend.post.trash')
        ->with('posts', Post::onlyTrashed()->paginate(5));
    }
    public function delete($id) {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return 'success';   
    
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->route('post.index');
    }
}
