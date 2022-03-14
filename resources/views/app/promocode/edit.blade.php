@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <!-- general form elements -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Promo Code</h3>
                </div>

                <div class="card-body container-fluid">

                    <form method="post" action="{{ route('promoes.update' , $promo->id) }}" id="app" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Price</label>
                                    <input type="text" value = "{{ $promo->price }}" placeholder="Price" name="price" id=""
                                        class="form-control form-control-sm" autocomplete="" required>
                                </div>
    
                                <div class="col-md-6 mt-2">
                                    <label for="">Start date</label>
                                    <input type="date" value = "{{ Carbon\Carbon::parse($promo->start_date)->format('Y-m-d')}}" name="start_date" id="" placeholder="Start date"
                                        class="form-control from-control" required>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="">Expir Date</label>
                                    <input type="date" value = "{{ Carbon\Carbon::parse($promo->end_date)->format('Y-m-d')}}" placeholder="Start date" name="end_date" id=""
                                        class="form-control form-control" required>
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

    </div>
@endsection
@push('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
