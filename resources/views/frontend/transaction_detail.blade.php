@extends('frontend.layouts.master')
@section('title','Transaction Detail')
@section('content')
<div class="transaction-detail">
  <div class="card">
     <div class="card-body">
         <!-- img -->
         <div class="d-flex justify-content-center mb-3">
            <img src="{{asset('frontend/images/transaction.png')}}" alt="">
         </div>

         <!-- alert -->
         @if (session('transfer_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{session('transfer_success')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>             
         @endif

         <!-- amount -->
         @if($transaction->type == 1)
            <h5 class="text-center text-success mb-4">{{number_format($transaction->amount)}} MMK</h5>
         @elseif($transaction->type == 2)
            <h5 class="text-center text-danger mb-4">{{number_format($transaction->amount)}} MMK</h5>
         @endif

        <!-- Details -->
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">Trx Id</p>
            <p class="mb-0">{{$transaction->trx_id}}</p>
         </div>
         <hr>
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">Reference Number</p>
            <p class="mb-0">{{$transaction->ref_no}}</p>
         </div>
         <hr>
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">Type</p>
            <p class="mb-0">
               @if ($transaction->type == 1)
                  <span class="badge badge-pill badge-success">income</span>
               @elseif($transaction->type == 2)
                  <span class="badge badge-pill badge-danger">expense</span>
               @endif
            </p>
         </div>
         <hr>
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">Amount</p>
            <p class="mb-0">{{number_format($transaction->amount)}} MMK</p>
         </div>
         <hr>
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">Date & Time</p>
            <p class="mb-0">{{$transaction->created_at}}</p>
         </div>
         <hr>
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">
               @if ($transaction->type == 1)
                  From
               @elseif($transaction->type == 2)
                   To
               @endif
            </p>
            <p class="mb-0">{{$transaction->source ? $transaction->source->name : '-'}}</p>
         </div>
         <hr>
         <div class="d-flex justify-content-between">
            <p class="mb-0 text-muted">Description</p>
            <p class="mb-0">{{$transaction->description}}</p>
         </div>  
     </div>
  </div>
</div> 

@endsection