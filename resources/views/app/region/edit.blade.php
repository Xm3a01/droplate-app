@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Region</h3>
                </div>

                <form method="post" action="{{ route('regions.update' , $region->id) }}" id="app" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                   <div class="form-body p-5">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="">City</label>
                            <select type="text" placeholder="Region" name="city_id" id=""
                                class="form-control form-control-sm" autocomplete="" required>
                                <option value="">Select--</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $region->city_id == $city->id ? 'selected' : '' }}>
                                        {{ $city->getTranslation('name' , 'ar') }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="">Region name</label>
                            <input type="text" placeholder="Region name" name="ar_name" id=""
                                class="form-control form-control-sm" autocomplete="" required
                                value="{{ $region->getTranslation('name' , 'ar') }}"
                                >
                        </div>
                        <div class="col-md-6">
                          <label for="">Region Arabic name</label>
                            <input type="text" placeholder="Region Arabic name" name="en_name" id=""
                                class="form-control form-control-sm" autocomplete="" required
                                value="{{ $region->getTranslation('name' , 'en') }}"
                                
                                >
                        
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mt-2">
                        <label for="">Queck delivery price</label>
                          <input type="text" placeholder="Queck delivery price" name="regular_delivery_price" id=""
                              class="form-control form-control-sm" autocomplete="" required
                              value="{{ $region->regular_delivery_price }}"
                              >
                      
                      </div>
                      <div class="col-md-6 mt-2">
                        <label for="">Normal delivery price</label>
                          <input type="text" placeholder="Normal delivery price" name="fast_delivery_price" id=""
                              class="form-control form-control-sm" autocomplete="" required
                              value="{{ $region->fast_delivery_price }}"
                              >
                      
                      </div>
                  </div>

                </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@push('js')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endpush
