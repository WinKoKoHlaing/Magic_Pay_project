@extends('frontend.layouts.master')
@section('title','Transaction')
@section('content')
   <div class="transaction">

      <div class="card mb-2">
         <div class="card-body p-2">
            <p><i class="fas fa-filter"></i> Filter</p>
            <div class="row">
               <div class="col-6 mb-3">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <label class="input-group-text p-1">Date</label>
                     </div>
                     <input type="text" class="form-control date" value="{{request()->date ?? date('Y-m-d')}}">
                  </div>
               </div>
               <div class="col-6 mb-3">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <label class="input-group-text p-1">Type</label>
                     </div>
                     <select class="custom-select type">
                        <option value="">All</option>
                        <option value="1" @if(request()->type == 1) selected @endif>Income</option>
                        <option value="2" @if(request()->type == 2) selected @endif>Expense</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <p class="m-2">Transactions</p>
      <div class="infinite-scroll">
         @foreach($transactions as $transaction)
            <a href="{{route('transaction-detail',$transaction->trx_id)}}">
               <div class="card mb-2">
                  <div class="card-body p-2">               
                     <div class="d-flex justify-content-between">
                        <h6 class="mb-1">Trx Id : {{$transaction->trx_id}}</h6>
                        <p class="mb-1 
                           @if ($transaction->type == 1) 
                              text-success
                           @elseif($transaction->type == 2)
                              text-danger
                           @endif">
                           
                           {{$transaction->amount}} <small>MMK</small>
                        </p>
                     </div>    
                     <p class="mb-1 text-muted"> 
                        @if ($transaction->type == 1)
                           From
                        @elseif($transaction->type == 2)
                           To
                        @endif
                        {{$transaction->source ? $transaction->source->name : ''}}
                     </p>
                     <p class="mb-1 text-muted">{{$transaction->created_at}}</p>     
                  </div>
               </div> 
            </a>
         @endforeach
         {{$transactions->links()}}
      </div>
   </div> 
  

@endsection
@section('scripts')
<script>
   //jscroll
   $('ul.pagination').hide();
   $(function() {
       $('.infinite-scroll').jscroll({
           autoTrigger: true,
           loadingHtml: '<div class="text-center"><img style="width:40px;" src="{{asset('frontend/jscroll/loading.gif')}}" alt="Loading..." /></div>',
           padding: 0,
           nextSelector: '.pagination li.active + li a',
           contentSelector: 'div.infinite-scroll',
           callback: function() {
               $('ul.pagination').remove();
           }
       });
   });

   //date-picker
   $('.date').daterangepicker({
      "singleDatePicker":true,
      "autoApply":true,
      "locale":{
         "format":"YYYY-MM-DD",
      }
   });
   $('.date').on('apply.daterangepicker', function(ev,picker){
      var type = $('.type').val();
      var date = $('.date').val();

      //url-asing-push
      history.pushState(null,'',`?date=${date}&type=${type}`);
      window.location.reload();
   });
   //income-expense-type
   $('.type').change(function(){
      var type = $('.type').val();
      var date = $('.date').val();

      //url-asing-push
      history.pushState(null,'',`?date=${date}&type=${type}`);
      window.location.reload();
   });
</script>
@endsection