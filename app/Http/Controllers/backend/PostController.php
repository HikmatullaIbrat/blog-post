<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
        ->with('posts',Post::all());
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
        return redirect()->route('post.index')->with('success', 'Post created successfully.');

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
    
        return redirect()->route('post.index')->with('success', 'Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
