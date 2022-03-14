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
                                        Oders
                                    </h3>
                                </div>
                                <div class="col-md-1">
                                 
                                </div>
                            </div>
                        </div>

                        <x-order.order-html /> 

                    </div>

                </div>

            </div>

        </div>

    </section>
    @endsection
    @push('js')
        <x-order.order-js />
    @endpush