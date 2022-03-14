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
                                        Clients
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

                        <x-user.user-html />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" id="create-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body" id="app">
                
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
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Age</label>
                          <input
                            type="text"
                            name="age"
                            class="form-control form-control-sm"
                            id=""
                            placeholder="Age"
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
                        <div class="col-md-6">
                          <label for="exampleInputEmail1">Gender</label>
                          <select
                           
                            name="gender"
                            class="form-control form-control-sm"
                            id="exampleInputEmail1"
                           
                          >
                          <option value="">Gender</option>
                          {{-- @foreach ($permissions as $permission) --}}
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          {{-- @endforeach --}}
                        </select>
                        </div>
                        <!-- purchasing_price -->
                        <div class="col-md-6">
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
                    <div class="form-group">
                      <label for="">Upload Image</label>
                      <input type="file" name="image" alt="" class="form-control form-control-sm">
                    </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <x-user.user-js route="data.products" />
@endpush
