@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Clinet</h3>
                </div>

                <form method="post" action="{{ route('users.update' , $user->id) }}" id="app" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body p-5" >
                    
                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label>Regions</label>
                            <select
                                name="region_id"
                                class="form-control form-control-sm thingSelect"
                                style="width: 100%"
                                placeholder="Name"
                            >
                            <option value="">Region</option>
                            @foreach ($regions as $region)
                                <option {{ $employee->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                          </select>
                            </div>
                            <div class="col-md-6">
                            <label>Cities</label>
                            <select
                                name="city_id"
                                class="form-control form-control-sm thingSelect"
                                style="width: 100%"
                                placeholder="Name"
                            >
                            <option value="">Cities</option>
                            @foreach ($cities as $city)
                                <option {{ $employee->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                          </select>
                            </div>
                        </div>
                        </div> --}}
                  
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Name</label>
                            <input
                              name="name"
                              class="form-control form-control-sm thingSelect"
                              style="width: 100%"
                              placeholder="Name"
                              value="{{ $user->name }}"
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
                              value="{{ $user->email }}"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">Password</label>
                            <input
                              type="password"
                              name="password"
                              class="form-control form-control-sm"
                              id=""
                              placeholder="EnterPassword"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">Phone</label>
                            <input
                              type="text"
                              name="phone"
                              class="form-control form-control-sm"
                              id=""
                              placeholder="Phone"
                              value="{{ $user->phone }}"
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
                                <option {{ $user->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ $user->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
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
                              value="{{ $user->address }}"
                            />
                          </div>
                         
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="">Age</label>
                            <input type="text" name="age" value="{{ $user->age }}" id="" placeholder="Age" class="form-control form-control-sm">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="">Upload image</label>
                            <input type="file" name="image" id="" class="form-control form-control-sm">
                          </div>
                        </div>
                      </div>
  
                      </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Save Change</button>
                    </div>
                </form>
            </div> 
        </div>

    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
