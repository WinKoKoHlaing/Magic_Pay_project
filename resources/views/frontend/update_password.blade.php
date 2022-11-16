@extends('frontend.layouts.master')
@section('title','Update Password')
@section('content')
    <div class="update-password">
      <div class="card col-md-9 mx-auto my-2">
         <div class="card-body">
            <div class="text-center">
               <img src="{{asset('frontend/images/password_outline.png')}}" alt="" class="img-fluid">
            </div>
            <form action="{{route('update-password.store')}}" method="POST">
               @csrf
               <div class="form-group">
                  <label for="">Old Password</label>
                  <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror">                  
                  @error('old_password')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror                  
               </div>
               <div class="form-group">
                  <label for="">New Password</label>
                  <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                  @error('new_password')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror 
               </div>
               <button type="submit" class="btn btn-theme btn-block mt-5">Update Password</button>
            </form>
         </div>
         
      </div>
    </div>

    
   
@endsection
@section('scripts')
   <script>
      $(document).ready(function(){
        
      });
   </script>
@endsection