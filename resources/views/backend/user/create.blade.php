@extends('backend.layouts.app')

@section('title','Create-User')
@section('user-active','mm-active')
@section('content')
<div class="app-page-title">
   <div class="page-title-wrapper">
       <div class="page-title-heading">
           <div class="page-title-icon">
               <i class="pe-7s-users icon-gradient bg-mean-fruit">
               </i>
           </div>
           <div>Create User</div>
       </div> 
   </div>
</div>

<div class="content pt-3">
   <div class="card">
      <div class="card-body">
         @include('backend.layouts.flash')
         <form action="{{route('admin.user.store')}}" method="POST" id="create">
            @csrf

            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
               <label for="phone">Phone</label>
               <input type="number" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
               <label for="password">Password</label>
               <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="d-flex justify-content-center">
               <button class="btn btn-sm btn-secondary mr-2 back-btn">Cancel</button>
               <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('scripts')

    <!--js-validation-->
    {!! JsValidator::formRequest('App\Http\Requests\UserStore','#create') !!}

    <!---->
    <script>
      $(document).ready(function(){
      
      });
    </script>
@endsection