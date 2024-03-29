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
                                        PromoCode
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

                        <x-promo.promo-html />

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Promo Code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('promoes.store') }}" id="create-form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Promo Code</label>
                                    <input type="text" placeholder="Promo Code" name="code" id=""
                                        class="form-control form-control-sm" autocomplete="" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="text" placeholder="Price" name="price" id=""
                                        class="form-control form-control-sm" autocomplete="" required>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="">Start date</label>
                                    <input type="date" name="start_date" id="" placeholder="Start date"
                                        class="form-control from-control" required>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Expir Date</label>
                                    <input type="date" placeholder="Start date" name="end_date" id=""
                                        class="form-control form-control" required>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="">Promo Type</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="radio" value="1" :disabled = "vatFlag == 0" name="promoType" required>
                                            <label for="">Percentage</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" value="0"  checked :disabled = "vatFlag == 0" name="promoType" required>
                                            <label for="">Price</label>
                                        </div>
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
        <x-promo.promo-js />
    @endpush
