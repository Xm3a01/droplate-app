@extends('layouts.app')
@push('css')
    <style>
        .warperContext {
            border: 1px solid rgb(235, 230, 230);
            border-radius: 5px;
            padding: 4px;
            box-shadow: 2px 3px 4px #b7b3b3c3;
        }
        
    </style>
@endpush
@section('content')
   <div class="row justify-content-center">
       <div class="col-md-8">
           <!-- general form elements -->
           <div class="card">
               <div class="card-header">
                   <h3 class="card-title">Send notification</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="{{route('notifications.send')}}" id="app" enctype="multipart/form-data">
                   @csrf  
                   {{-- @method('PUT') --}}

                   <div class="form-body px-5 pt-5" >
                    
                      <div class="form-group">
                        <div class="row">
                          
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">Title</label>
                            <input
                              type="text"
                              name="title"
                              class="form-control form-control-sm"
                              id=""
                              placeholder="Title"
                              value=""
                            />
                          </div>
                        </div>
                        </div>
                      <div class="form-group">
                        <div class="row">
                          <!-- purchasing_price -->
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">Content</label>
                            <textarea
                              type="text"
                              name="content"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Content"
                            ></textarea>
                          </div>
                         
                        </div>
                      </div>
  
                      
                    </div>

                   <div class="card-footer">
                       <button type="submit" class="btn btn-sm btn-primary">Send</button>
                   </div>
               </form>
           </div>
       </div>

   </div>
@endsection

@push('js')
  <script src="{{asset('js/app.js')}}"></script>
@endpush
