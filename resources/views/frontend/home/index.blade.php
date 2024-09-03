@extends('frontend.layout.master')

@section('content')

   <!-- Page Header-->
   <header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/home-bg.jpg') }}')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
    </header>
           
       <!-- Main Content-->
       <div class="container px-4 px-lg-5">
        
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($posts as $post_item)  
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{route('home.show',['slug'=>$post_item->slug])}}">
                        <h2 class="post-title">{{$post_item->title}}</h2>
                        <h3 class="post-subtitle">{{$post_item->sub_title}}</h3>
                    </a>
                    <div class="container">
                        {{Str::limit($post_item->description, 90)}}
                    </div>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        {{$post_item->created_at->diffForHumans()}}
                    </p>
                </div>
                @endforeach
                <!-- Pager-->
                <hr class="my-4">
                <div class="row">
                    {{-- {{$posts->links()}} --}}
                    <div class="mx-auto col-2 ">
                      {{$posts->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
       
    </div>
   
@endsection