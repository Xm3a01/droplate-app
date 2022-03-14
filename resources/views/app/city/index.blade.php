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
                                        Cities & Regions
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

                        <x-city.city-html />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New City & Region</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cities.store') }}" id="create-form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Region</label>
                                    <select type="text" placeholder="Region" name="region_id" id=""
                                        class="form-control form-control-sm" autocomplete="" required>
                                        <option value="">Region</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">
                                                {{ $region->getTranslation('name' , 'ar') }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="">City name</label>
                                    <input type="text" placeholder="City name" name="city_en_name" id=""
                                        class="form-control form-control-sm" autocomplete="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="">City Arabic name</label>
                                    <input type="text" placeholder="City Arabic name" name="city_ar_name" id=""
                                        class="form-control form-control-sm" autocomplete="" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <label for="">Queck delivery price</label>
                                    <input type="text" placeholder="Queck delivery price" name="regular_delivery_price"
                                        id="" class="form-control form-control-sm" autocomplete="" required>

                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Normal delivery price</label>
                                    <input type="text" placeholder="Normal delivery price" name="fast_delivery_price" id=""
                                        class="form-control form-control-sm" autocomplete="" required>

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
        <x-city.city-js />
    @endpush
