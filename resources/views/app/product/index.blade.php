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
                                        Products
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

                        <x-product.product-html />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" id="create-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body" id="app">
                      <input-select 
                      items = "{{ $categories }}"
                      sub_item = "sub_category"
                      title_1 = "Category"
                      title_2 = "Sub Category"
                      name_1 = "category_id"
                      name_2 = "sub_category_id"
                      > </input-select>
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Product AR name</label>
                          <input
                            name="ar_name"
                            class="form-control form-control-sm thingSelect"
                            style="width: 100%"
                            placeholder="Arabic name"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label>Product EN name</label>
                          <input
                            name="en_name"
                            class="form-control form-control-sm"
                            style="width: 100%"
                            placeholder="English name"
                            required
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Quantity</label>
                          <input
                            type="text"
                            name="quantity"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                            placeholder="Enter Quantity"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Discount</label>
                          <input
                            type="text"
                            name="discount"
                            class="form-control form-control-sm"
                            id=""
                            placeholder="Enter Discount"
                            value="0"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="exampleInputEmail1">Selling price</label>
                          <input
                            type="text"
                            name="selling_price"
                            class="form-control form-control-sm"
                            id=""
                            placeholder="Enter Selling price"
                            required
                          />
                        </div>
                        <!-- purchasing_price -->
                        <div class="col-md-4">
                          <label for="exampleInputEmail1">Wholesale price</label>
                          <input
                            type="text"
                            name="wholesale_price"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                            placeholder="Enter Wholesale price"
                            required
                          />
                        </div>
                        <div class="col-md-4">
                          <label for="exampleInputEmail1">Purchasing price</label>
                          <input
                            type="text"
                            name="purchasing_price"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                            placeholder="Enter Purchasing price"
                            required
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleInputEmail1">English Description</label>
                          <textarea
                            type="text"
                            name="en_description"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                            placeholder="Enter Description"
                            required
                          >
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="exampleInputEmail1">Arabic Description </label>
                          <textarea
                            type="text"
                            name="ar_description"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                            placeholder="Enter Description"
                            required
                          >
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <input-image />
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
    <script src="{{ asset('js/app.js') }}"></script>
    <x-product.product-js route="data.products" />
@endpush
