@extends('frontend.layouts.master')
@section('title','Notification')
@section('content')
   <div class="notification">

      <!--infinite-scroll-->
      <div class="infinite-scroll">
         @foreach($notifications as $notification)
            <a href="{{route('notification-detail',$notification->id)}}">
               <div class="card mb-2">
                  <div class="card-body p-2">               
                     <h6> <i class="fas fa-bell @if(is_null($notification->read_at)) text-danger @endif"></i> {{Illuminate\Support\Str::limit($notification->data['title'],30)}}</h6>
                     <p class="mb-1">{{Illuminate\Support\Str::limit($notification->data['message'],100)}}</p>
                     <small class="text-muted mb-1">{{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d h:i:s A')}}</small>
                  </div>
               </div> 
            </a>
         @endforeach
         {{$notifications->links()}}
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

</script>
@endsection