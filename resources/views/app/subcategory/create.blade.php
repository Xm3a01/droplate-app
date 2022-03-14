@extends('layouts.app')
@push('css')
    <style>
        .warperContext {
            border: 1px solid rgb(235, 230, 230);
            border-radius: 5px;
            /* overflow-y: scroll; */
            padding: 4px;
            box-shadow: 2px 3px 4px #b7b3b3c3;
        }
        
    </style>
@endpush
@section('content')
   <div class="row justify-content-center">
       <div class="col-md-8">
           <!-- general form elements -->
           <div class="card card-dark">
               <div class="card-header">
                   <h3 class="card-title">Loaging Form</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="{{route('products.store')}}" id="app" enctype="multipart/form-data">
                   @csrf
                  
                      <product-form 
                        categories = "{{$categories}}" 
                        errors = "{{count($errors->all()) > 0 ? json_encode($errors->all()) : null}}"
                      ></product-form>
   
                   <div class="card-footer">
                       <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                   </div>
               </form>
           </div>
       </div>

   </div>
@endsection

@push('js')
  <script src="{{asset('js/app.js')}}"></script>
@endpush
