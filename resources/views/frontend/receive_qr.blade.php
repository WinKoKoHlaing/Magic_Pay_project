@extends('frontend.layouts.master')
@section('title','Receive QR')
@section('content')
<div class="receive-qr">
   <div class="card">
      <div class="card-body">
         <div class="text-center">
            <p class="text-center text-muted mb-0">QR SCAN TO PAY ME</p>
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(240)->generate($authUser->phone)) !!} ">
         </div>
         <p class="text-center text-muted m-0">{{$authUser->name}}</p>
         <p class="text-center text-muted m-0">{{$authUser->phone}}</p>
      </div>
   </div>
</div> 

@endsection
