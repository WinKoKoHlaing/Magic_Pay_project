@extends('frontend.layouts.master')
@section('title','Profile')
@section('content')
    <div class="account">
       <div class="profile">
          <img src="https://ui-avatars.com/api/?background=5842E3&color=fff&name=Admin" alt="">
       </div>

       <div class="card  my-4">
         <div class="card-body">
           <div class="d-flex justify-content-between">
              <span>Name</span>
              <span>{{$user->name}}</span>
           </div>
           <hr>
           <div class="d-flex justify-content-between">
              <span>Email</span>
              <span>{{$user->email}}</span>
           </div>
           <hr>
           <div class="d-flex justify-content-between">
              <span>Phone</span>
              <span>{{$user->phone}}</span>
           </div>
         </div>
      </div>

      <div class="card  my-4">
         <div class="card-body">
           <a href="{{route('update-password')}}" class="d-flex justify-content-between">
              <span>Update Password</span>
              <span><i class="fas fa-angle-right"></i></span>
           </a>
           <hr>
           <a href="#" class="d-flex justify-content-between logout">
            <span>Logout</span>
            <span><i class="fas fa-angle-right"></i></span>
           </a>
      </div>
    </div>

    
   
@endsection
@section('scripts')
   <script>
      $(document).ready(function(){
         $(document).on('click','.logout',function(){
            //sweet-alert
            Swal.fire({
            title: 'Are you sure to logout?',
            showCancelButton: true,
            confirmButtonText: `Confirm`,
            reverseButtons:true,          
            }).then((result) => {
            
            if (result.isConfirmed) {
               $.ajax({
                  url : "{{route('logout')}}",
                  type : 'POST',
                  success : function(){                                      
                     window.location.replace("{{route('profile')}}");
                  }
               });
               } 
            })
         });
      });
   </script>
@endsection