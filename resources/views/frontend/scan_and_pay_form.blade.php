@extends('frontend.layouts.master')
@section('title','Scan & Pay')
@section('content')
<div class="scan_and_pay">
   <div class="card">
      <div class="card-body">
         @include('frontend.layouts.flash')
         <form action="{{route('scan-and-pay-confirm')}}" method="GET" autocomplete="off" id="transfer-form">

            <!--hidden_value-->
            <input type="hidden" name="hash_value" class="hash_value" value="">
            <input type="hidden" name="to_phone" class="to_phone" value="{{$to_account->phone}}">

            <div class="form-group mb-4">
               <label for="" class="mb-0">From</label>
               <p class="mb-1 text-muted">{{$from_account->name}}</p>
               <p class="mb-1 text-muted">{{$from_account->phone}}</p>
            </div>
           
            <div class="form-group mb-4">
               <label for="" class="mb-0">To</label>
               <p class="mb-1 text-muted">{{$to_account->name}}</p>
               <p class="mb-1 text-muted">{{$to_account->phone}}</p>
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