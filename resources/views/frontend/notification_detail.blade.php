@extends('frontend.layouts.master')
@section('title','Notification Detail')
@section('content')
<div class="notification-detail">
  <div class="card">
     <div class="card-body text-center">
         <div class="mb-3">
         <i class="fas fa-envelope" style="font-size:50px;color:#5842E3;"></i>
         </div>
         <h5>{{$notification->data['title']}}</h5>
         <p class="mb-1 text-muted">{{$notification->data['message']}}</p>
         <p class="mb-3">{{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d h:i:s A')}}</p>
         <a href="{{$notification->data['web_link']}}">
         <button class="btn btn-theme btn-sm">Continue</button>
         </a>
     </div>
  </div>
</div> 

@endsection