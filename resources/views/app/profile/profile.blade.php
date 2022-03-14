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
       <div class="col-md-8">
           <!-- general form elements -->
           <div class="card">
               <div class="card-header">
                   <h3 class="card-title">Update Profile</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form method="post" action="{{route('profile.edit' , $user->id)}}" id="app" enctype="multipart/form-data">
                   @csrf  
                   @method('PUT')

                   <div class="form-body px-5 pt-5" >
                    
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
                            <option value="">Region</option>
                            @foreach ($regions as $region)
                                <option {{ $user->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }}</option>
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
                            <option value="">Cities</option>
                            @foreach ($cities as $city)
                                <option {{ $user->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
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
                          <!-- purchasing_price -->
                          <div class="col-md-12">
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
  <script src="{{asset('js/app.js')}}"></script>
@endpush
