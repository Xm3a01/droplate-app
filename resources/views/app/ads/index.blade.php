@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> --}}
@endpush
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row justify-content-between">
                <div class="col-md-11 " id="buttonData">
                  <h3 class="card-title d-sm-none d-lg-block">
                    Ads
                  </h3>
                </div>
                <div class="col-md-1">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modal-lg">
                        <i class="fa fa-plus"></i> New
                    </button>
                </div>
              </div>
            </div>
            <div class="p-5">
              <div class="row">
                <div class="col-md-12">
                </div>
                @php
                    $images = isset($ads->images) ? $ads->images : [];
                @endphp
                @foreach ($images  as $key => $image)
                <div class="col-md-3">
                  <div class="card" style="width: 13rem;">
                    <img class="card-img-top" src="{{ $image->getUrl() }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Slide {{ $key + 1 }}</h5>
                      <p class="card-text"></p>
                      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>
                </div>      
                @endforeach
              </div>
            </div> 
          </div>          
        </div>        
      </div>     
    </div>  
  </section>

  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Ads</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ads.store') }}" id="create-form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row" id="app">
                            <div class="col-md-12">
                                <label for="">name</label>
                                <input type="text" placeholder="Name" name="name" id=""
                                  class="form-control form-control-sm" autocomplete="" required>
                            </div>
                            <div class="col-md-12 mt-2">
                              <label for="">Slide 1</label>
                              <input
                                type="file"
                                name="images[]"
                                id=""
                                class="form-control form-control-sm"
                              />
                            </div>
                            <div class="col-md-12 mt-2">
                              <label for="">Slide 2</label>
                              <input
                                type="file"
                                name="images[]"
                                id=""
                                class="form-control form-control-sm"
                              />
                            </div>
                            <input-image />

                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
    
@endsection

@push('js')
 <script src="{{ asset('js/app.js') }}"></script>
 {{-- <x-ads.ads-js /> --}}
@endpush