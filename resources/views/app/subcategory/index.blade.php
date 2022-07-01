@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
                                        Sub categories
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

                        <x-sub-category.sub-category-html />

                    </div>

                </div>

            </div>

        </div>

    </section>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Sub Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sub_categories.store') }}" id="create-form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Arabic name</label>
                                        <input type="text" placeholder="Arabic name" name="ar_name" id=""
                                            class="form-control form-control-sm" autocomplete="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">English name</label>
                                        <input type="text" placeholder="English name" name="name" id=""
                                            class="form-control form-control-sm" autocomplete="" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <label for="">Categories</label>
                                     <select name="category_id" id="" class="form-control from-control-sm" required>
                                       <option value="">-- Select --</option>
                                       @foreach ($categories as $category)
                                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                                       @endforeach
                                     </select>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="">Image</label>
                                      <input type="file" placeholder="" name="image" id=""
                                          class="form-control form-control-sm" autocomplete="" required>
                                  </div>
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
@endsection

@push('js')
    <x-sub-category.sub-category-js />
@endpush
