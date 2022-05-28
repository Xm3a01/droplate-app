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
       {{-- <setting-page inline-template>   --}}
       <div class="col-md-8">
           <!-- general form elements -->
           <div class="card">
               
               <div class="card-header">
                   <div class="row justify-content-between">
                           <div class="col-md-8">
                               <h3 class="card-title">Condition & praivcy</h3>

                           </div>
                   </div>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="{{route('conditions.update')}}" id="setting-form"  enctype="multipart/form-data">
                   @csrf
                       <div class="catainer-fluid">
                           <div class="row  p-4">
                               <div class="from-group">
                                   {{-- <div class="col-md-1"> --}}
                                       
                                   {{-- </div> --}}
                                   <div class="col-md-11">
                                     <label for="">Condition & praivcy</label>
                                     <textarea name="content" id="" rows="11" cols="100"  class="form-control" placeholder="Condition & praivcy">{{ $condition->content ?? "" }}</textarea>
                                      {{-- <input type="text" value="{{ $setting->vat ?? 0 }}" :disabled = "vatFlag == 0"  placeholder="Vat" name="vat" required> --}}
                                   </div>

                               </div>

                              

                               </div>
                           </div>

                       </div>
                   <div class="card-footer">
                       <button type="submit" class="btn btn-sm btn-primary">Save</button>
                   </div>
                </form>
            </div>
        </div>
    {{-- </setting-page> --}}

   </div>
@endsection

@push('js')
  <script src="{{asset('js/app.js')}}"></script>
@endpush
