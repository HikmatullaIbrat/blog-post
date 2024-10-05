@extends('backend.layout.master')

@section('content')


<div class="card">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
        <form class="form" action="{{route('users.store')}}" method="POST">
          @csrf
            
            <div class="form-group">
                <label for="Name">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                @error('name')
                  <p class="text-danger">
                    {{$message}}
                  </p>
                @enderror
            </div>
              
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="email" name="email" class="form-control" id="inputAddress" placeholder="Enter User Email">
              @error('email')
              <p class="text-danger">
                {{$message}}
              </p>
            @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" placeholder="Confirm User Password">
              {{-- <textarea name="description" class="form-control my-editor" name="description" placeholder="Enter post content" cols="30" rows="10"></textarea> --}}
              @error('password')
              <p class="text-danger">
                {{$message}}
              </p>
            @enderror
            </div>

            <div class="form-group">
                <label for="confirm_pass">Password</label>
                <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Confirm Pasword">
                {{-- <textarea name="description" class="form-control my-editor" name="description" placeholder="Enter post content" cols="30" rows="10"></textarea> --}}
                @error('confirm_pass')
                <p class="text-danger">
                  {{$message}}
                </p>
              @enderror
              </div>

              <div class="form-group">
                <label for="inputEmail4">Profile Picture</label>
                <div class="input-group">
                    <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"> Choose Pic </i>
                      </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="file" name="image">

                    {{-- <input id="thumbnail" class="form-control" type="text" value="{{$settings->logo}}" name="logo"> --}}
                    {{-- <input type="file" name="logo" accept=".svg"> --}}

                  </div>
                  <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                @error('image')
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