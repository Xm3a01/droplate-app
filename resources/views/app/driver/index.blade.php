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
                                        Drivers
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

                        <x-driver.driver-html />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Driver</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('drivers.store') }}" id="create-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body" id="app">
                      <input-select 
                      items = "{{ $cities }}"
                      sub_item = "cities"
                      title_2 = "Region"
                      title_1 = "City"
                      name_2 = "region_id"
                      name_1 = "city_id"
                      
                      > </input-select>
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Name</label>
                          <input
                            name="name"
                            class="form-control form-control-sm thingSelect"
                            style="width: 100%"
                            placeholder="Name"
                          />
                        </div>
                        {{-- phone --}}
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Phone</label>
                          <input
                            type="text"
                            name="phone"
                            class="form-control form-control-sm"
                            id=""
                            placeholder="Phone"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Password</label>
                          <input
                            type="password"
                            name="password"
                            class="form-control form-control-sm"
                            id=""
                            placeholder="EnterPassword"
                          />
                        </div>
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Confirm password</label>
                          <input
                            type="password"
                            name="password_confirmaition"
                            class="form-control form-control-sm"
                            id=""
                            placeholder="Enter Confirm password"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Email</label>
                          <input
                            name="email"
                            type="email"
                            class="form-control form-control-sm"
                            style="width: 100%"
                            placeholder="E-mail"
                          />
                        </div>
                        
                      </div>
                      </div>
                    <div class="form-group">
                      <div class="row">
                        {{-- <div class="col-md-6">
                          <label for="exampleInputEmail1">Permissions / صلاحيات</label>
                          <select
                           
                            name="permission"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                           
                          >
                          <option value="">Permission</option>
                          @foreach ($permissions as $permission)
                              <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                          @endforeach
                        </select>
                        </div> --}}
                        <!-- purchasing_price -->
                        <div class="col-md-12">
                          <label for="exampleInputEmail1">Address</label>
                          <input
                            type="text"
                            name="address"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                            placeholder="Enter Address"
                          />
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
    <x-driver.driver-js route="data.products" />
@endpush
