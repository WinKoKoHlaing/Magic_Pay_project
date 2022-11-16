@if (count($errors))
@foreach($errors->all() as $error)
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{$error}}
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div> 
@endforeach
@endif

