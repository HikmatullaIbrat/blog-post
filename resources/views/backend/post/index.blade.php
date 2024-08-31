@extends('backend.layout.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Posts List</h1>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-success float-right" href="{{route('post.create')}}">Create Post</a>
                
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>title</th>
                <th>sub title</th>
                <th>description</th>
                </tr>
            </thead>

            <tbody>
              @foreach($posts as $post)

              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->sub_title}}</td>
                <td>{{$post->description}}</td>
                <td>
                  <a href="{{route('post.edit',['post' => $post->id])}}"><i class="fa fa-edit"></i></a>
                  <a href=""><i class="fa fa-trash"></i></a>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>

          
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

</div>
<!-- /.container-fluid -->

@endsection
