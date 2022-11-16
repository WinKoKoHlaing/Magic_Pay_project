@extends('frontend.layouts.master')
@section('title','Transfer')
@section('content')
<div class="transfer">
   <div class="card">
      <div class="card-body">
         @include('frontend.layouts.flash')
         <form action="{{route('transfer-confirm')}}" method="GET" autocomplete="off" id="transfer-form">

            <!--hidden_value-->
            <input type="hidden" name="hash_value" class="hash_value" value="">

            <div class="form-group mb-4">
               <label for="" class="mb-0">From</label>
               <p class="mb-1 text-muted">{{$userWallet->name}}</p>
               <p class="mb-1 text-muted">{{$userWallet->phone}}</p>
            </div>
            <div class="form-group">
               <label for="">To <span class="to_account_info "></span></label>
               <div class="input-group">
                  <input type="text" name="to_phone" class="form-control to_phone" value="{{old('to_phone')}}">
                  <div class="input-group-append">
                     <span class="input-group-text btn verify-btn"><i class="fas fa-check-circle"></i></span>
                  </div>
               </div>
               @error('to_phone')
                   <span class="text-danger">
                      <strong>{{$message}}</strong>
                   </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="">Amount (MMK)</label>
               <input type="number" name="amount" class="form-control amount" value="{{old('amount')}}">
               @error('amount')
                   <span class="text-danger">
                      <strong>{{$message}}</strong>
                   </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="">Description</label>
               <textarea name="description" class="form-control description">{{old('description')}}</textarea>
            </div>
            <button type="submit" class="btn btn-theme btn-block mt-5 submit-btn">Continue</button>
         </form>
      </div>
   </div>
</div> 

@endsection
@section('scripts')
   <script> 
      $(document).ready(function(){
         $('.verify-btn').on('click',function(){
         var phone = $('.to_phone').val();
            $.ajax({
               url : '/to-account-verify?phone=' + phone,
               type : 'GET',
               success : function(res){
                  // console.log(res);
                  if(res.status == 'success'){
                     $('.to_account_info').text('('+res.data['name']+')').addClass('text-success');
                  }else{
                     $('.to_account_info').text('('+res.message+')').addClass('text-danger');
                  }
               }

            });
         });

         $('.submit-btn').on('click',function(e){
            e.preventDefault();

            var to_phone = $('.to_phone').val();
            var amount = $('.amount').val();
            var description = $('.description').val();
            
            $.ajax({
               url : `/transfer-hash?to_phone=${to_phone}&amount=${amount}&description=${description}`,
               type : 'GET',
               success : function(res){
                  // console.log(res);
                 if(res.status == 'success'){
                     $('.hash_value').val(res.data);
                     $('#transfer-form').submit();
                 }
               }

            });
         });
      });
   </script>
@endsection