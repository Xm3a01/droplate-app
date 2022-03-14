@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update City</h3>
                </div>

                <form method="post" action="{{ route('cities.update', $city->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body p-5">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Region</label>
                                <select type="text" placeholder="Region" name="region_id" id=""
                                    class="form-control form-control-sm" autocomplete="" required>
                                    <option value="">Region</option>
                                    @foreach ($regions as $region)
                                        <option {{ $region->id == $city->region_id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="">City name</label>
                                <input type="text" placeholder="City name" name="city_en_name" id=""
                                    class="form-control form-control-sm" autocomplete="" required
                                    value="{{ $city->getTranslation('name', 'en') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">City Arabic name</label>
                                <input type="text" placeholder="City Arabic name" name="city_ar_name" id=""
                                    class="form-control form-control-sm" autocomplete="" required
                                    value="{{ $city->getTranslation('name', 'ar') }}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="">Queck delivery price</label>
                                <input type="text" placeholder="Queck delivery price" name="regular_delivery_price" id=""
                                    class="form-control form-control-sm" autocomplete="" required
                                    value="{{ $city->regular_delivery_price }}">

                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="">Normal delivery price</label>
                                <input type="text" placeholder="Normal delivery price" name="fast_delivery_price" id=""
                                    class="form-control form-control-sm" autocomplete="" required
                                    value="{{ $city->fast_delivery_price }}">

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
