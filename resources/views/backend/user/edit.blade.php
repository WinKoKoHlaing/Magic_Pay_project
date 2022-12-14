@extends('backend.layouts.app')

@section('title','Edit-User')
@section('user-active','mm-active')
@section('content')
<div class="app-page-title">
   <div class="page-title-wrapper">
       <div class="page-title-heading">
           <div class="page-title-icon">
               <i class="pe-7s-users icon-gradient bg-mean-fruit">
               </i>
           </div>
           <div>Edit User</div>
       </div> 
   </div>
</div>

<div class="content pt-3">
   <div class="card">
      <div class="card-body">
         @include('backend.layouts.flash')
         <form action="{{route('admin.user.update',$user->id)}}" method="POST" id="update">
            @csrf
            @method('PUT')
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" required value="{{$user->email}}">
            </div>
            <div class="form-group">
               <label for="phone">Phone</label>
               <input type="number" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="text" name="password" id="password" class="form-control" >
            </div>
            <div class="d-flex justify-content-center">
               <button class="btn btn-sm btn-secondary mr-2 back-btn">Cancel</button>
               <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('scripts')
    <!--js-validation-->
    {!! JsValidator::formRequest('App\Http\Requests\UserUpdate','#update') !!}

    <!---->
    <script>
      $(document).ready(function(){
      
      });
    </script>
@endsection