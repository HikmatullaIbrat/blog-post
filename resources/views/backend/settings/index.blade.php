@extends('backend.layout.master')

@section('content')


<div class="card">
    <div class="card-header">
      Edit Post
    </div>
    <div class="card-body">
        {{--the data is coming from post.index and edited here--}}
        <form class="form" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
            {{-- <form action="" class="form"> --}}
          @csrf  
            <div class="form-group">
                <label for="inputEmail4">Logo</label>
                <div class="input-group">
                    <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                      </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" value="{{$settings->logo}}" name="logo">
                  </div>
                  <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                @error('loge')
                  <p class="text-danger">
                    {{$message}}
                  </p>
                @enderror
            </div>
              
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input type="text" name="facebook" class="form-control" value="{{$settings->facebook}}" id="inputAddress"  placeholder="Enter Post subtitle">
              @error('facebook')
              <p class="text-danger">
                {{$message}}
              </p>
            @enderror
            </div>

            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" class="form-control" id="inputAddress" value="{{$settings->twitter}}" placeholder="Enter Post subtitle">
                @error('twiter')
                <p class="text-danger">
                  {{$message}}
                </p>
              @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="inputAddress" value="{{$settings->email}}" placeholder="Enter Post subtitle">
                @error('email')
                <p class="text-danger">
                  {{$message}}
                </p>
              @enderror
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{$settings->phone}}" placeholder="Enter Post subtitle">
                @error('phone')
                <p class="text-danger">
                  {{$message}}
                </p>
              @enderror
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" value="{{$settings->address}}" placeholder="Enter Post subtitle">
                @error('address')
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

@section('script')
<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
     $('#lfm').filemanager('image');
</script>

@endsection