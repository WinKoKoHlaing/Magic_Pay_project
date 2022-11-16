@extends('frontend.layouts.master')
@section('title','Wallet')
@section('content')
<div class="wallet">
   <div class="card my-card ">
      <div class="card-body">
         <div class="mb-3">
            <span>Balance</span>
            <h4>{{number_format($userWallet->wallet ? $userWallet->wallet->amount : 0)}} <span>MMK</span></h4>
         </div>
         <div class="mb-4">
            <span>Account Number</span>
            <h5>{{$userWallet->wallet ? $userWallet->wallet->account_number : '-'}}</h5>
         </div>
         <div class="">
            <p>{{$userWallet->name}}</p>
         </div>
      </div>
   </div>
</div> 

@endsection