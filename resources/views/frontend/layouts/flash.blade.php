@if ($errors->has('fail'))

   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{$errors->first('fail')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
         <span aria-hidden="true">&times;</span>
      </button>
   </div> 

@endif
{{-- {{$errors}} --}}