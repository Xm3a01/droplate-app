@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Driver</h3>
                </div>

                <form method="post" action="{{ route('drivers.update' , $driver->id) }}" id="app" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body p-5" >
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                            <label>Regions</label>
                            <select
                                name="region_id"
                                class="form-control form-control-sm thingSelect"
                                style="width: 100%"
                                placeholder="Name"
                            >
                            <option value="">--select --</option>
                            @foreach ($regions as $region)
                                <option {{ $driver->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                          </select>
                            </div>
                            <div class="col-md-6">
                            <label>Cities</label>
                            <select
                                name="city_id"
                                class="form-control form-control-sm thingSelect"
                                style="width: 100%"
                                
                            >
                            <option value="">--Select--</option>
                            @foreach ($cities as $city)
                                <option {{ $driver->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                          </select>
                            </div>
                        </div>
                        </div>
                  
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Name</label>
                            <input
                              name="name"
                              class="form-control form-control-sm thingSelect"
                              style="width: 100%"
                              placeholder="Name"
                              value="{{ $driver->name }}"
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
                              value="{{ $driver->email }}"
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
                              value="{{ $driver->phone }}"
                            />
                          </div>
                        </div>
                        </div>
                      <div class="form-group">
                        <div class="row">
                          
                          <!-- purchasing_price -->
                          <div class="col-md-12">
                            <label for="exampleInputEmail1">Address</label>
                            <input
                              type="text"
                              name="address"
                              class="form-control form-control-sm"
                              id="exampleInputEmail1"
                              placeholder="Enter Address"
                              value="{{ $driver->address }}"
                            />
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
