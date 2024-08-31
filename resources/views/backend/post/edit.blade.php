@extends('backend.layout.master')

@section('content')


<div class="card">
    <div class="card-header">
      Edit Post
    </div>
    <div class="card-body">
        {{--the data is coming from post.index and edited here--}}
        <form class="form" action="{{route('post.update',['post'=>$post->id])}}" method="POST">
          @csrf  
          @method('PUT')
            <div class="form-group">
                <label for="inputEmail4">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" placeholder="Enter Post title">
                @error('title')
                  <p class="text-danger">
                    {{$message}}
                  </p>
                @enderror
            </div>
              
            <div class="form-group">
              <label for="sub_title">Sub Title</label>
              <input type="text" name="sub_title" class="form-control" id="inputAddress" value="{{$post->sub_title}}" placeholder="Enter Post subtitle">
              @error('sub_title')
              <p class="text-danger">
                {{$message}}
              </p>
            @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control my-editor" name="description" value="" placeholder="Enter post content" cols="30" rows="10">{{$post->description}}</textarea>
              @error('description')
              <p class="text-danger">
                {{$message}}
              </p>
            @enderror
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>


@endsection