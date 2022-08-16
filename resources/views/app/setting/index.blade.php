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
   <div class="row justify-content-center" id="app">
       <setting-page inline-template>
       <div class="col-md-8">
           <!-- general form elements -->
           <div class="card">

               <div class="card-header">
                   <div class="row justify-content-between">
                           <div class="col-md-8">
                               <h3 class="card-title">System Setting</h3>

                           </div>
                           <div :class="vatFlag ? 'col-md-4' : 'col-md-2'">
                                <button v-if ="vatFlag" class="btn btn-info btn-xs" @click = "save()">Save Change</button>
                                <button v-if ="vatFlag" class="btn btn-info btn-xs" @click = "vatFlag = 0">Cancel</button>
                                <button v-if ="!vatFlag" class="btn btn-info btn-xs" @click.prevint ="vatFlag = 1">Change Setting</button>
                           </div>
                   </div>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="{{route('setting.update')}}" id="setting-form"  enctype="multipart/form-data">
                   @csrf
                       <div class="catainer-fluid">
                           <div class="row  p-4">
                               <div class="from-group">
                                   <div class="col-md-1">
                                       <label for="">Vat</label>
                                   </div>
                                   <div class="col-md-11">
                                       <input type="text" value="{{ $setting->vat ?? 0 }}" :disabled = "vatFlag == 0"  placeholder="Vat" name="vat" class="form-control form-control-sm" required>
                                   </div>

                               </div>

                               <div class="form-group">
                                   <div class="col-md-1">
                                    <label for="">Points</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="{{ $setting->points ?? 0 }}" :disabled = "vatFlag == 0"  placeholder="Points" name="points" class="form-control form-control-sm" required>
                                </div>

                               </div>

                               {{-- <div class="form-group">
                                <div class="col-md-1">
                                 <label for="">PromoType</label>
                             </div>
                             <div class="col-md-11">
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <input type="radio" value="1" {{ $setting->promoType == 1 ? 'checked' : ''}} :disabled = "vatFlag == 0" name="promoType" required>
                                        Percentage
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input type="radio" value="0"  {{ $setting->promoType == 0 ? 'checked' : ''}} :disabled = "vatFlag == 0" name="promoType" required>
                                        Price
                                    </div>
                                </div> -

                             </div>

                            </div> --}}
                           </div>

                       </div>
                   {{-- <div class="card-footer" v-if ="vatFlag == 1">
                       <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                   </div> --}}
                </form>
            </div>
        </div>
    </setting-page>

   </div>
@endsection

@push('js')
  <script src="{{asset('js/app.js')}}"></script>
@endpush
