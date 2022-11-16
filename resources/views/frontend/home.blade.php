@extends('frontend.layouts.master')
@section('title','Magic Pay')
@section('content')
    <div class="home">
       <div class="profile">
          <img src="https://ui-avatars.com/api/?background=5842E3&color=fff&name={{Auth::guard('web')->user()->name}}" alt="">
          <h5 class="">{{$user->name}}</h5>
          <p class="text-muted">{{number_format($user->wallet ? $user->wallet->amount : 0)}} MMK</p>
       </div>

       <div class="row my-4">
            <a href="{{url('/scan-and-pay')}}" class="col-6 pr-1">
                <div class="card">
                    <div class="card-body shortcut-box pt-3">
                        <img src="{{asset('frontend/images/qr-code-scan.png')}}" alt="">
                        <span>Scan & Pay</span>
                    </div>
                </div>
            </a>
            <a href="{{url('/receive-qr')}}" class="col-6 pl-1">
                <div class="card">
                    <div class="card-body shortcut-box pt-3">
                        <img src="{{asset('frontend/images/qr-code.png')}}" alt="">
                        <span>Receive Qr</span>
                    </div>
                </div>
            </a>
       </div>

      <div class="card my-4">
         <div class="card-body function-box">
            <a href="{{route('transfer')}}" class="d-flex justify-content-between">
                <span><img src="{{asset('frontend/images/money-transfer.png')}}" alt="">Transfer</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <hr>
            <a href="#" class="d-flex justify-content-between">
                <span><img src="{{asset('frontend/images/wallet.png')}}" alt="">Wallet</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
            <hr>
            <a href="{{route('transaction')}}" class="d-flex justify-content-between">
                <span><img src="{{asset('frontend/images/transaction.png')}}" alt="">Transcation</span>
                <span><i class="fas fa-angle-right"></i></span>
            </a>
         </div>
      </div>

    
   
@endsection
@section('scripts')
   <script>
      $(document).ready(function(){
         $(document).on('click','.logout',function(e){
            e.preventDefault();
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