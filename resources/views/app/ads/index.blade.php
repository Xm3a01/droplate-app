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
                @foreach ($en_ads  as $key => $ad)
                <div class="col-md-3">
                  <div class="card" style="width: 13rem;">
                    <img class="card-img-top" height="150" src="{{ Storage::url($ad->image) }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Slide {{ $key + 1 }}</h5>
                      <p class="card-text">{{ $ad->link }}</p>
                      <a href="" onclick="enEditSlid({{ $ad->id }} , event)" id="en-edit-btn-{{ $ad->id }}" class="btn btn-primary btn-xs">edit</a>
                      <a href="" style="display: none" onclick="enCanecl({{ $ad->id }} , event)" class="btn btn-info btn-xs" id="en-cancel-{{ $ad->id }}">Canecl</a>
                      <a href="" onclick="enDeleteSlide({{ $ad->id }} , event)" class="btn btn-danger btn-xs">delete</a>
                    </div>
                    <form action="{{ route('ads.destroy' , $ad->id) }}" method="POST" id="en-delete-slide-{{ $ad->id }}">
                      @csrf
                      @method('delete')
                      <input  type="hidden" name="lang" value="en">
                    </form>
                    <div class="card-footer" id="en-edit-form-{{ $ad->id }}" style="display: none">
                      <form action="{{ route('ads.update' , $ad->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                          <div class="row">
                            <div class="form-group">
                              <div class="col-md-12">
                                <input type="file" name="image" class="form-control form-control-sm">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <input type="text" name="link" class="form-control form-control-sm" 
                                value="{{ $ad->link }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-xs">Save Change</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                  </div>
                  </div>
                </div>      
                @endforeach
                <div class="col-md-3">
                  <a href="" data-toggle="modal"
                  data-target="#modal-en-slide">
                  <div class="card bg-gray" style="width: 13rem;">
                    <div class="card-body">
                      <h5 class="card-title text-md">
                        <i class="fa fa-plus mr-2"></i>
                        Add English Slide
                      </h5>
                      
                    </div>
                  </div>
                </a>
                </div>
              </div>
                <hr>
              <div class="row">
                @foreach ($ar_ads  as $key => $ad)
                <div class="col-md-3">
                  <div class="card" style="width: 13rem;">
                    <img class="card-img-top" height="150" src="{{ Storage::url($ad->ar_image) }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Slide {{ $key + 1 }}</h5>
                      <p class="card-text">{{ $ad->ar_link }}</p>
                      <div class="row">
                        <div class="col-md-2">
                          <a href="" onclick="editSlid({{ $ad->id }} , event)" id="ar-edit-btn-{{ $ad->id }}" class="btn btn-primary btn-xs">edit</a>
                        </div>
                        <div class="col-md-2">
                          <a href="" style="display: none" onclick="arCanecl({{ $ad->id }} , event)" class="btn btn-info btn-xs" id="ar-cancel-{{ $ad->id }}">Canecl</a>
                        </div>
                        <div class="col-md-2">
                          <a href="" onclick="arDeleteSlide({{ $ad->id }} , event)" class="btn btn-danger btn-xs">delete</a>
                        </div>
                      </div>
                    </div>
                    <form action="{{ route('ads.destroy' , $ad->id) }}" method="POST" id="ar-delete-slide-{{ $ad->id }}">
                      @csrf
                      @method('delete')
                      <input  type="hidden" name="lang" value="ar">
                    </form>
                    <div class="card-footer" id="edit-form-{{ $ad->id }}" style="display: none">
                        <form action="{{ route('ads.update' , $ad->id) }}" method="POST"
                          enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="form-body">
                            <div class="row">
                              <div class="form-group">
                                <div class="col-md-12">
                                  <input type="file" name="ar_image" class="form-control form-control-sm">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-12">
                                  <input type="text" name="ar_link" class="form-control form-control-sm" 
                                  value="{{ $ad->ar_link }}">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary btn-xs">Save Change</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>      
                @endforeach
                <div class="col-md-3">
                  <a href=""  data-toggle="modal"
                  data-target="#modal-ar-slide">
                  <div class="card bg-gray" style="width: 13rem;">
                    <div class="card-body">
                      <h5 class="card-title text-md">
                        <i class="fa fa-plus mr-2"></i>
                         Add Arabic Slide
                      </h5>
                      
                    </div>
                  </div>
                </a>
                </div>
              </div>
            </div> 
          </div>          
        </div>        
      </div>     
    </div>  
  </section>

  <div class="modal fade" id="modal-en-slide">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">English Slide</h4>
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
                            <div class="col-md-12 mt-2">
                              <label for="">English Slide</label>
                              <input
                                type="file"
                                name="image"
                                id=""
                                class="form-control form-control-sm"
                              />
                              <br>
                              <label for="">English Link</label>
                              <input type="text" name="link" class="form-control form-control-sm">
                            </div>

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
  </div>


  <div class="modal fade" id="modal-ar-slide">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Arabic Slide</h4>
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
                            <div class="col-md-12 mt-2">
                              <label for="">Arabic Slide</label>
                              <input
                                type="file"
                                name="ar_image"
                                id=""
                                class="form-control form-control-sm"
                              />
                              <br>
                              <label for="">Arabic Link</label>
                              <input type="text" name="ar_link" class="form-control form-control-sm">
                            </div>

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
  </div>
    
@endsection

@push('js')
 <script src="{{ asset('js/app.js') }}"></script>
 <script>
   function editSlid(id , event){
      event.preventDefault();
     $('#edit-form-'+id).css('display' , 'block')
     $('#ar-edit-btn-'+id).css('display' , 'none')
     $('#ar-cancel-'+id).css('display' , 'block')
    // alert(id);
   }
   function enEditSlid(id , event){
      event.preventDefault();
     $('#en-edit-form-'+id).css('display' , 'block')
     $('#en-edit-btn-'+id).css('display' , 'none')
     $('#en-cancel-'+id).css('display' , 'block')
    // alert(id);
   }

   function enCanecl(id , event){
      event.preventDefault();
     $('#en-edit-form-'+id).css('display' , 'none')
     $('#en-edit-btn-'+id).css('display' , 'block')
     $('#en-cancel-'+id).css('display' , 'none')
    //  en-cancel
    // alert(id);
   }


   function arCanecl(id , event){
      event.preventDefault();
     $('#edit-form-'+id).css('display' , 'none')
     $('#ar-edit-btn-'+id).css('display' , 'block')
     $('#ar-cancel-'+id).css('display' , 'none')

    // alert(id);
   }

   function arDeleteSlide(id , event) {
    event.preventDefault(); 
    
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover slide!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                  document.getElementById('ar-delete-slide-'+id).submit();
            } else {
                swal("Your Silde is safe!");
            }
        })
   }

   function enDeleteSlide(id , event) {
    event.preventDefault(); 

    swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover Slide!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      }).then((result) => {
          if (result) {
            document.getElementById('en-delete-slide-'+id).submit();
      } else {
          swal("Your Slide is safe!");
      }
    })
   }

   
 </script>
@endpush