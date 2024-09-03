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
                  <a href="#" class="delete" id="{{$post->id}}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>

              @endforeach

             
            </tbody>
          
          </table>
          <div class="row">
            {{-- {{$posts->links()}} --}}
            <div class="mx-auto col-2 ">
              {{$posts->links('pagination::bootstrap-5')}}
            </div>
          </div>
          
          

          
          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
      </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('script')

<script>
// $('.delete').click(function(){
//   alert('hello');
// });
  $('.delete').click(function(preventDefault){
        Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        
           // "Deleted!",
          // "Your file has been deleted.",
          // "success"
          var id = $(this).attr('id');
          var url = 'post/'+id;

          $.ajax
          ({
            headers :{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            url:url,
            type:"DELETE",
            datatype:'json',
            data: {"_method": 'DELETE',},
            success:function(data){
                location.reload();
            }
          })
        
         
        
      }
    })


  });
</script>


@endsection
